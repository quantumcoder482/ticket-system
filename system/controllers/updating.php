<?php
$action = route(1,'schema');

switch ($action){


    case 'schema':


        $message = Update::singleCommand();

        updateOption('build',$file_build);

        $message .= '---------------------------'.PHP_EOL;

        $message .= 'Redirecting, please wait...';



        $script = '<script>
    $(function() {
        var delay = 10000;
        var $serverResponse = $("#serverResponse");
        var interval = setInterval(function(){
   $serverResponse.append(\'.\');
}, 500);
        
        setTimeout(function(){ window.location = \''.U.'dashboard\'; }, delay);
    });
</script>';

        HtmlCanvas::createTerminal($message,$script);



        break;



	case 'map_with_account':

		is_dev();

		$accounts = Account::all()->keyBy('account')->all();

		$transactions = Transaction::all();

		foreach ($transactions as $transaction)
		{
			$transaction->account_id = $accounts[$transaction->account]->id;
			$transaction->save();
		}



		break;


	case 'map_with_categories':

		is_dev();

		$categories = TransactionCategory::all()->keyBy('name')->all();

		$transactions = Transaction::all();

		foreach ($transactions as $transaction)
		{
			if($transaction->category != '' && isset($categories[$transaction->category]))
			{
				$transaction->cat_id = $categories[$transaction->category]->id;
				$transaction->save();
			}

		}



		break;




}
