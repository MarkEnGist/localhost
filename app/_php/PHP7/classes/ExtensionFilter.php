<?php
/**
 * Created by PhpStorm.
 * User: Матвей
 * Date: 12.08.2018
 * Time: 23:32
 */

namespace PHP7\classes {

    class ExtensionFilter extends \FilterIterator
    {
        private $ext;
        private $it;

        /**
         * ExtensionFilter constructor.
         * @param \DirectoryIterator $it
         * @param $extension
         */
        public function __construct(\DirectoryIterator $it, $extension)
        {
            parent::__construct($extension);
            $this->it = $it;
            $this->ext = $extension;
        }

        /**
         * @return bool
         */
        public function accept()
        {
            if(!$this->it->isDir()) {
                $ext = pathinfo($this->current(), PATHINFO_EXTENSION);
                return $ext != $this->ext;
            }
            return true;
        }
    }
}