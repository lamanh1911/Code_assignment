<?php
class BankAccount
{
    const INTEREST_RATE = 0.05;

    public static function calculateInterest($balance, $years)
    {
        return $balance * (1 + self::INTEREST_RATE) ** $years;
    }
}

$user1 = BankAccount::calculateInterest(1000, 3);

echo "Số dư sau 3 năm là " . $user1;
