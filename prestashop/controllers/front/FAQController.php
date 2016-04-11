<?php

class FAQControllerCore extends FrontController
{
    public function init()
    {
        parent::init();
        $questions = [
            'Vos articles sont-ils tous en stock?' => 'Les articles les plus vendus sont en stock dans nos locaux, le réaprovisionnement se fait en 48 heures. Les délais de livraison peuvent varier de 2 à 5 jours. Pour les grosses pièces, ce délai peut augmenter, dans ce cas, vous serez contacté pour vous préciser ce délai.',
            'Je ne trouve pas la réponse à ma question. Que faire?' => 'Cliquez sur la rubrique "contact" et faites-nous part de votre question, nous y répondrons dans les plus brefs délais.',
            'Je voudrais faire un cadeau. Est-ce possible?' => 'Pas de problème. Vous pouvez envoyer un cadeau à un tiers en renseignant son adresse en adresse de livraison et la votre en adresse de facturation.',
            'Quand vais-je recevoir ma commande?' => '2 à 5 jours pour les articles courants (en ne tenant pas commpte d éventuels problèmes de transports type grève). Pour les gros articles, ce délai peut augmenter, dans ce cas nous vous contacterons pour vous préciser le délai',
            'Quels sont les moyens de paiement que vous acceptez?' => 'Vous avez plusieurs possibilités = soit par chèque, carte bancaire avec Paypal (vous n avez pas besoin de compte Paypal) et compte Paypal',
        ];	

        $this->context->smarty->assign([
            'questions' => $questions,
        ]);


    }
    public function initContent()
    {
        parent::initContent();
        $this->setTemplate(_PS_THEME_DIR_.'faq.tpl');
    }
}