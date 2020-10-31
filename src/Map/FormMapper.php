<?php

namespace App\Map;


use App\Components\Request;
use App\Model\Base\BaseModel;

/**
 * @author Alex Nguetcha <nguetchaalex@gmail.com>
 */
class FormMapper
{
    public function map(Request $request, BaseModel $model): BaseModel
    {
        $vars = $model->getClassVars();
        foreach ($vars as $attr=>$value) {
            /**
             * On verifie si le formulaire contient un champ de name="_attr"
             * par GET POST FILES
             */
            $attrFormValue = $request->get(
                "_" . $attr,
                $request->post->get(
                    "_" . $attr,
                    $request->files->get("_" . $attr, null)
                )
            );
            
            if ($attrFormValue !== null) {
                $setter = "set" . ucwords($attr);
                $setter = str_replace("_", "", $setter);
                $model->$setter($attrFormValue);
            }
        }
        return $model;
    }
}
