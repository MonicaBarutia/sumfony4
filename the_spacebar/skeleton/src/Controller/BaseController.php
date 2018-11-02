<?php
/**
 * Created by PhpStorm.
 * User: Monica
 * Date: 11/2/2018
 * Time: 11:32 AM
 */

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

abstract class BaseController extends AbstractController
{
    /**
     * @method User|null getUser()
     */
    protected function getUser(): User
    {
        return parent::getUser();
    }

}