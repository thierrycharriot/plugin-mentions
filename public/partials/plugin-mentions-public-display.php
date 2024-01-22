<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://thierrycharriot.github.io
 * @since      1.0.0
 *
 * @package    Plugin_Mentions
 * @subpackage Plugin_Mentions/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<?php 
    // https://developer.wordpress.org/reference/functions/get_userdata/
    // get_userdata( int $user_id ): WP_User|false
    // Retrieves user info by user ID.
    $user_infos = get_userdata(1); 
    //var_dump($user_infos); die(); // debug OK
    $user_courriel = $user_infos->user_email;
    $user_courriel = str_replace( '@', ' (signe bizarre) ', $user_courriel );
?>

<!-- ChatGPT 3.5  => Ecris moi une page de mentions légales pour un portfolio Wordpress -->

<div class="card m-3">
    <div class="card-body">
        <h2>Éditeur du Site</h2>
            <ul>
                <li>Nom de l'entreprise/individu : <?php echo $user_infos->first_name .  " " . $user_infos->last_name; ?></li>
                <!--<li>Adresse : [Votre Adresse]</li>-->
                <!--<li>Téléphone : [Votre Numéro de Téléphone]</li>-->
                <li>Email : <?php echo $user_courriel; ?></li>
            </ul>

        <h2>Directeur de la Publication</h2>
            Nom du directeur de la publication : <?php echo $user_infos->first_name .  " " . $user_infos->last_name; ?>
        <!--
        <h2>Hébergement</h2>
            
            <ul>
                <li>Nom de l'hébergeur : [Nom de l'Hébergeur]</li>
                <li>Adresse : [Adresse de l'Hébergeur]</li>
                <li>Téléphone : [Numéro de Téléphone de l'Hébergeur]</li>
                <li>Email : [Adresse Email de l'Hébergeur]</li>
            </ul>
        -->
        <h2>Propriété Intellectuelle</h2>
        <p>L'ensemble du contenu de ce site, incluant mais ne se limitant pas aux textes, images, graphiques ou code source, est protégé par les lois sur le droit d'auteur et la propriété intellectuelle. Tous les droits sont réservés.</p>

        <h2>Cookies</h2>
        <p>Ce site utilise des cookies pour améliorer l'expérience de l'utilisateur. En continuant à naviguer sur ce site, vous consentez à l'utilisation de cookies conformément à notre politique en matière de cookies.</P>

        <h2>Collecte et Utilisation des Données Personnelles</h2>
        <p>Nous collectons des informations personnelles lorsque vous nous les fournissez volontairement, telles que lorsque vous remplissez un formulaire de contact. Ces informations seront utilisées uniquement dans le but spécifié au moment de la collecte et ne seront pas partagées avec des tiers sans votre consentement.</p>

        <h2>Droit d'Accès et de Rectification</h2>
        <p>Conformément à la loi "Informatique et Libertés", vous avez le droit d'accéder, de modifier, de rectifier et de supprimer les données vous concernant. Pour exercer ce droit, veuillez nous contacter à <?php echo $user_courriel; ?>.</p>

        <h2>Responsabilité</h2>
        <p>L'éditeur décline toute responsabilité quant à l'exactitude, l'exhaustivité ou la mise à jour des informations présentes sur ce site. L'utilisation des informations contenues sur ce site se fait sous la responsabilité exclusive de l'utilisateur.</p>

        <h2>Contact</h2>
        <p>Pour toute question ou demande d'information concernant le site et les mentions légales, veuillez nous contacter à l'adresse suivante : <?php echo $user_courriel; ?>.</p>
    </div>
</div>


