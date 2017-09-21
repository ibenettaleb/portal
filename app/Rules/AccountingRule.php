<?php

    namespace App\Rules;

    use Adldap\Models\User as LdapUser;
    use Adldap\Laravel\Validation\Rules\Rule;

    class AccountingRule extends Rule
    {
        /**
         * The LDAP user.
         *
         * @var User
         */
        protected $user;
        
        /**
         * The Eloquent model.
         *
         * @var Model|null
         */
        protected $model;
        
        /**
         * Determines if the user is allowed to authenticate.
         *
         * Only allows users in the `Admin-Portal` group to authenticate.
         *
         * @return bool
         */   
        public function isValid()
        {
            return $this->user->inGroup('Admin-Portal');
        }
    }