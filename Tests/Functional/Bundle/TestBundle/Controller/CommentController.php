<?php

/*
 * This file is part of the FOSRestBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\RestBundle\Tests\Functional\Bundle\TestBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

class CommentController
{
    public function getCommentAction($id)
    {
        return new Response("<html><body>$id</body>");
    }

    public function getComments()
    {
        return new Response("<html><body>comments ..</body>");
    }
}
