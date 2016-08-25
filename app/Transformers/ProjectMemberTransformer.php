<?php
/**
 * Created by PhpStorm.
 * User: rui
 * Date: 13/08/16
 * Time: 17:06
 */

namespace CodeProject\Transformers;

use CodeProject\Entities\User;
use CodeProject\Entities\ProjectMember;
use League\Fractal\TransformerAbstract;

class ProjectMemberTransformer extends TransformerAbstract
{

    public function transform(User $member){

        return [

            'member_id' => $member->id,
            'name' => $member->name
        ];

    }

}