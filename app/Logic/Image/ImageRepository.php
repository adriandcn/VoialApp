<?php
namespace App\Logic\Image;
use App\Models\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ImageRepository {
    public function upload($form_data) {
        if ($form_data['id_catalogo_fotografia'] == 1) {
        $numImages = DB::table('images')->where('id_usuario_servicio',$form_data['id_usuario_servicio'])
                    ->where('estado_fotografia',1)
                    ->where('id_catalogo_fotografia',1)
                    ->count();
        }else{
          $numImages = 0;  
        }
        if ($numImages > (config('global.freeImageLimit') - 1)) {
            return Response::json([
                        'error' => 'Unicamente esta permitido ' . config('global.freeImageLimit') . ' imagenes por servicio en la version free.' ,
                        'name' => 'imageLimit',
                        'code' => 507
                            ], 507);
        }else{
            $validator = Validator::make($form_data, Image::$rules, Image::$messages);
            if ($validator->fails()) {
                return Response::json([
                            'error' => $validator->messages()->first(),
                            'message' => $validator->messages()->first(),
                            'code' => 400
                                ], 400);
            }
            $photo = $form_data['file'];
            $originalName = $photo->getClientOriginalName();
            $originalNameWithoutExt = substr($originalName, 0, strlen($originalName) - 4);
            $filename = $this->sanitize($originalNameWithoutExt);
            $allowed_filename = $this->createUniqueFilename($filename);
            $filenameExt = $form_data['id_auxiliar'] . $allowed_filename . '.jpg';
            $uploadSuccess1 = $this->original($photo, $filenameExt);
            $uploadSuccess2 = $this->icon($photo, $filenameExt);
            if (!$uploadSuccess1 || !$uploadSuccess2) {
                return Response::json([
                            'error' => true,
                            'message' => 'Server error while uploading',
                            'code' => 500
                                ], 500);
            }
            $sessionImage = new Image;
            $sessionImage->filename = $form_data['id_auxiliar'] . $allowed_filename . '.jpg';
            $sessionImage->original_name = $originalName;
            $sessionImage->id_catalogo_fotografia = $form_data['id_catalogo_fotografia'];
            $sessionImage->id_usuario_servicio = $form_data['id_usuario_servicio'];
            $sessionImage->id_auxiliar = $form_data['id_auxiliar'];
            $sessionImage->estado_fotografia = 1;
            $sessionImage->user_id = $form_data['user_id'];
            $sessionImage->es_principal = intval($form_data['profile_pic']);
            $isProfile = ($numImages == 0) ? 1 : intval($form_data['profile_pic']);
            $sessionImage->profile_pic = $isProfile;
            $sessionImage->save();
            return Response::json([
                        'error' => false,
                        'code' => 200
                            ], 200);
        }
    }
    public function createUniqueFilename($filename) {
        $full_size_dir = 'imagesg/fullsize/';
        $full_image_path = $full_size_dir . $filename . '.jpg';
        if (File::exists($full_image_path)) {
            // Generate token for image
            $imageToken = substr(sha1(mt_rand()), 0, 5);
            return $filename . '-' . $imageToken;
        }
        return uniqid();
    }
    public function storeDescrFoto($inputs, $usuario_servicio,$id) {
        DB::table('images')
                ->where('id', '=', $inputs['ids'])
                ->update(['descripcion_fotografia' => $inputs['descripcion_fotografia_'.$id]]);
        return true;
    }
    public function storeUpdateEstado($inputs, $usuario_servicio) {
        DB::table('images')
                ->where('id', '=', $inputs['ids'])
                ->update(['estado_fotografia' => 0]);
        return true;
    }
    //Entrega el arreglo de Servicios por operador
    public function getServiciosImageporId($id_image) {
        return DB::table('images')
                        ->where('id', '=', $id_image)->get();
    }
    /**
     * Optimize Original Image
     */
    public function original($photo, $filename) {
        $manager = new ImageManager();
        $manager->make($photo)->encode('jpg')->save('images/fullsize/' . $filename);
        $image = File::exists(public_path() . '/images/fullsize/' . $filename);
        return $image;
    }
    /**
     * Create Icon From Original
     */
    public function icon($photo, $filename) {
        $manager = new ImageManager();
        $manager->make($photo)->encode('jpg')->resize(350, null, function($constraint) {
                    $constraint->aspectRatio();
                })->save('images/icon/' . $filename);
        $image = File::exists(public_path() . '/images/fullsize/' . $filename);
        return $image;
    }
    /**
     * Delete Image From Session folder, based on original filename
     */
    public function delete($originalFilename) {
        $full_size_dir = Config::get('images.fullsize');
        $icon_size_dir = Config::get('images.icon_size');
        $sessionImage = Image::where('original_name', 'like', $originalFilename)->first();
        if (empty($sessionImage)) {
            return Response::json([
                        'error' => true,
                        'code' => 400
                            ], 400);
        }
        $full_path1 = $full_size_dir . $sessionImage->filename . '.jpg';
        $full_path2 = $icon_size_dir . $sessionImage->filename . '.jpg';
        if (File::exists($full_path1)) {
            File::delete($full_path1);
        }
        if (File::exists($full_path2)) {
            File::delete($full_path2);
        }
        if (!empty($sessionImage)) {
            $sessionImage->delete();
        }
        return Response::json([
                    'error' => false,
                    'code' => 200
                        ], 200);
    }
    function sanitize($string, $force_lowercase = true, $anal = false) {
        $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
            "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
            "â€�?", "â€“", ",", "<", ".", ">", "/", "?");
        $clean = trim(str_replace($strip, "", strip_tags($string)));
        $clean = preg_replace('/\s+/', "-", $clean);
        $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean;
        return ($force_lowercase) ?
                (function_exists('mb_strtolower')) ?
                        mb_strtolower($clean, 'UTF-8') :
                        strtolower($clean) :
                $clean;
    }
     public function storeProfileFoto($inputs, $usuario_servicio,$id,$tipo) {
        if ($tipo == 1) {
            DB::table('images')
                    ->where('id_usuario_servicio', '=', $usuario_servicio)
                    ->where('id_catalogo_fotografia', '=', $tipo)
                    ->update(['profile_pic' => "0"]);
        };
        if ($tipo == 2){
            DB::table('images')
                    ->where('id_auxiliar', '=', $usuario_servicio)
                    ->where('id_catalogo_fotografia', '=', $tipo)
                    ->update(['profile_pic' => "0"]);
        }
        echo $inputs['ids'];
           DB::table('images')
                ->where('id', '=', $inputs['ids'])
                ->update(['profile_pic' => 1]);
        return true;
    }
}
