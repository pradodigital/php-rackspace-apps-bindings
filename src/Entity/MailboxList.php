<?php

namespace PradoDigital\Rackspace\Apps\Entity;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class MailboxList extends AbstractEntity implements \IteratorAggregate
{
    protected $offset;

    protected $size;

    protected $total;

    protected $mailboxes;

    public function __construct()
    {
        $this->mailboxes = array();
    }

    public function denormalize(DenormalizerInterface $denormalizer, $data, $format = null)
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

    public function getOffset()
    {
        return $this->offset;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function getMailboxes()
    {
        return $this->mailboxes;
    }

    public function setOffset($offset)
    {
        $this->offset = $offset;
        return $this;
    }

    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    public function setTotal($total)
    {
        $this->total = $total;
        return $this;
    }

    public function addMailbox(Mailbox $mailbox)
    {
        $this->mailboxes[] = $mailbox;
        return $this;
    }
}
