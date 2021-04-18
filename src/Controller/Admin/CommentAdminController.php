<?php

namespace App\Controller\Admin;

use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class CommentAdminController extends CRUDController
{
	public function validateAction($id)
	{
		$comment = $this->admin->getSubject();

		if (!$comment) {
			throw new NotFoundHttpException(
				sprintf('Unable to find the comment with id: %s', $id));
		}

		$comment->setValidated(true);
		$this->admin->update($comment);

		return new RedirectResponse($this->admin->generateUrl('list'));
	}
}
