<?php

namespace PradoDigital\Rackspace\Apps\Entity;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class MailboxList extends AbstractEntityList
{
    private $mailboxes;

    public function __construct()
    {
        $this->mailboxes = array();
    }

    public function denormalize(DenormalizerInterface $denormalizer, $data, $format = null, array $context = array())
    {
        if (isset($data['mailboxes'])) {
            foreach ($data['mailboxes'] as $value) {
                $mailbox = $denormalizer->denormalize($value, __NAMESPACE__ . '\\' . 'Mailbox');
                $this->addMailbox($mailbox);
            }
            unset($data['mailboxes']);
        }

        return parent::denormalize($denormalizer, $data, $format);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->getMailboxes());
    }

    public function getMailboxes()
    {
        return $this->mailboxes;
    }

    public function addMailbox(Mailbox $mailbox)
    {
        $this->mailboxes[] = $mailbox;
        return $this;
    }
}
