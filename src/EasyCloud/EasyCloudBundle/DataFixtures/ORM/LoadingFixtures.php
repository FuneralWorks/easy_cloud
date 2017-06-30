<?php

namespace EasyCloud\EasyCloudBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use EasyCloud\EasyCloudBundle\Entity\User;
use EasyCloud\EasyCloudBundle\Entity\Role;

use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;

class LoadingFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
// Create the roles
    $role_user = new Role();
    $role_user->setName("ROLE_USER");
    $manager->persist($role_user);
    $manager->flush();

    $role_admin = new Role();
    $role_admin->setName("ROLE_ADMIN");
    $manager->persist($role_admin);
    $manager->flush();

    // create a user
    $user = new User();

    // On donne le login Admin à notre nouvel utilisateur
    $user->setUsername('admin');

    // On crée un salt pour amélioré la sécurité
    $user->setSalt(md5(time()));

    // On crée un mot de passe (attention, comme vous pouvez le voir, il faut utiliser les même paramètres
    // que spécifiés dans le fichier security.yml, à savoir SHA512 avec 10 itérations.
    $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
    // On crée donc le mot de passe "admin" à partir de l'encodage choisi au-dessus
    $password = $encoder->encodePassword('password', $user->getSalt());
    // On applique le mot de passe à l'utilisateur
    $user->setPassword($password);
    $user->setFirstName("Nathan");
    $user->setLastName("Calvarin");
    $user->setEmail("nathan.calvarin@gmail.com");
    $user->getUserRoles()->add($role_admin);

    $manager->persist($user);
    $manager->flush();


    }
}
