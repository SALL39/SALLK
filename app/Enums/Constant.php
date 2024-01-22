<?php

namespace App\Enums;

interface Constant
{
    CONST USER_STATUS_ACTIVE = 1;
    CONST USER_STATUS_INACTIVE = 0;


    //user type
    CONST ADMIN = 1;
    CONST AGENT = 2;
    CONST USER = 3;
    CONST SELLER = 4;

    //is_activaed
    CONST ACCOUNT_ACTIVATED = 1;
    CONST ACCOUNT_NOT_ACTIVATED = 0;

    // image folders
    CONST PRODUCT = '/product/';
    CONST BANNER = '/banner/';
    CONST ABOUTUS = '/about-us/';
    CONST FEATURED = '/featured/';
    CONST CATEGORY = '/category/';

    // Transaction type
    CONST BALANCE_REQUEST = 1;
    CONST MOBILE_RECHARGE = 2;
    CONST BALANCE_TOPUP = 3;
    CONST BALANCE_TRANSFER = 4;
    CONST ACCOUNT_ACTIVATATION_DISTRIBUTION = 5;

    // amount types
    CONST DEBIT = 1;
    CONST CREDIT = 2;

    //payment method
    CONST BKASH = 1;
    CONST NOGAD = 2;
    CONST ROCKET = 3;

    //status

    CONST PENDING = 1;
    CONST APPROVED = 2;
    CONST REJECTED = 3;

}
