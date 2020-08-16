<?php

namespace Base\Processor\TransactionProccesor;

class TransactionProccesor
{
    private $_fileUtilityManager;
    private $_errorManager;
    public function __construct($fileUtilityManager, $errorManager)
    {
        $this->$_fileUtilityManager = $fileUtilityManager;
        $this->$_errorManager = $errorManager;
    }

    function process_transactions()
    {
        $transaction_content = $this->$_fileUtilityManager->read_transaction_file();
        if($transaction_content)
        {
            foreach (explode("\n", $transaction_content) as $transaction) {
                $this->validate_transaction($transaction);
            }
        }
        else
        {
            var_dump('no content or no file found');
        }
    }

    function validate_transaction($transaction_string)
    {
        if (empty($transaction_string))
        { 
            var_dump('tranasction not valid');
            return;
        }
        $transaction = json_decode($transaction_string);

        $is_card_in_europe_zone = ExternalRequests::validate_card_location($transaction->bin);
        $currency_rate = ExternalRequests::get_currency_rate($transaction->currency);

        $amount_fixed = $this->calculate_rate($transaction->currency, $currency_rate, $transaction->amount);
        $this->log_currency_rate($amount_fixed, $is_card_in_europe_zone, $transaction->amount);

        print "\n";
    }

}

