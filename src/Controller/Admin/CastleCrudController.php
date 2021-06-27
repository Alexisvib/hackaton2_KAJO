<?php

namespace App\Controller\Admin;

use App\Entity\Castle;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CastleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Castle::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
