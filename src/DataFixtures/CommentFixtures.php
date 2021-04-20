<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CommentFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $comment1 = new Comment();
        $comment1
            ->setArticle($this->getReference(ArticleFixtures::ARTICLE1))
            ->setPublicationDate(new \DateTime('2021-01-16'))
            ->setAuthorPseudo('Pipiou')
            ->setContent('Pellentesque maximus volutpat felis, eget luctus dolor imperdiet vitae. Vestibulum condimentum, ligula vitae pharetra tempor, magna odio condimentum nunc, at posuere ipsum neque ut tellus.')
            ->setValidated(true);
        $manager->persist($comment1);

        $comment2 = new Comment();
        $comment2
            ->setArticle($this->getReference(ArticleFixtures::ARTICLE1))
            ->setPublicationDate(new \DateTime('2021-01-17'))
            ->setAuthorPseudo('Steam')
            ->setContent('Donec finibus velit vel magna pharetra bibendum')
            ->setValidated(true);
        $manager->persist($comment2);

        $comment3 = new Comment();
        $comment3
            ->setArticle($this->getReference(ArticleFixtures::ARTICLE1))
            ->setPublicationDate(new \DateTime('2021-01-18'))
            ->setAuthorPseudo('Trois-Pattes')
            ->setContent('mraou')
            ->setValidated(false);
        $manager->persist($comment3);

        $manager->flush();
    }
}
