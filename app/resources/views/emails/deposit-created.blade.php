<link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
<div style="background-color:#efefef;font-family:'Ubuntu',sans-serif;font-size:15px;padding:50px 20px">
    <table style="border:1px solid #e0e0e0;width:100%;max-width:500px;margin:auto;background-color:#fff">
        <tbody><tr>
            <td style="text-align:center;background-color: #000;">
                <h2 style="color: #fff;"> {{ config('app.name') }} </h2>
            </td> 
        </tr>
                <tr>
            <td style="text-align:center;font-weight:bold;margin:10px"><br>
                <u>DEP0S|T SUCCESSFUL</u> <br>
                <p>Hello {{ $deposit->user->name }}</p>
                <p style="font-size: 14px;">Your DEP0S|T of {{ moneyFormat($deposit->amount, 'USD') }} was Successful!</p>
            </td>
        </tr>
        <tr>
            <td style="border-collapse:collapse;padding:10px">
                <table width="100%" style="border-collapse:collapse">
                    
                    <tbody><tr>
                        <td style="padding:15px 10px;border:1px solid #f5f5f5;width:35%">
                            DEP0S|T Ref:
                        </td>
                        <td style="padding:15px 10px;border:1px solid #f5f5f5;width:65%">
                            {{ $deposit->ref }}
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="padding:15px 10px;border:1px solid #f5f5f5;width:35%">
                            Plan:
                        </td>
                        <td style="padding:15px 10px;border:1px solid #f5f5f5;width:65%">
                            {{ $deposit->plan->formatted_name }}
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:15px 10px;border:1px solid #f5f5f5;width:35%">
                            Amount:
                        </td>
                        <td style="padding:15px 10px;border:1px solid #f5f5f5;width:65%">
                            {{ moneyFormat($deposit->amount, 'USD') }}
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:15px 10px;border:1px solid #f5f5f5;width:35%">
                            Total Return:
                        </td>
                        <td style="padding:15px 10px;border:1px solid #f5f5f5;width:65%">
                            {{ moneyFormat($deposit->profit, 'USD') }}
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:15px 10px;border:1px solid #f5f5f5;width:35%">
                            Payment Method:
                        </td>
                        <td style="padding:15px 10px;border:1px solid #f5f5f5;width:65%">
                            {{ $deposit->formatted_payment_method }}
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:15px 10px;border:1px solid #f5f5f5;width:35%">
                            Status:
                        </td>
                        <td style="padding:15px 10px;border:1px solid #f5f5f5;width:65%">
                            @if( $deposit->status == \App\Models\Deposit::STATUS_COMPLETED)
                                <span style="color: green;">Completed</span>
                            @elseif ($deposit->status == \App\Models\Deposit::STATUS_CANCELED)
                                <span style="color: red;">Canceled</span>
                            @else
                                <span style="color: green;">Active</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:15px 10px;border:1px solid #f5f5f5;width:35%">
                            Expires at:
                        </td>
                        <td style="padding:15px 10px;border:1px solid #f5f5f5;width:65%">
                            {{ $deposit->expires_at->diffForHumans() }}
                        </td>
                    </tr>
                                        
                    
                </tbody></table>
            </td>
        </tr>
        
                <tr>
            <td style="text-align:center;padding:10px;font-size:12px">
                If you have any issues or complaints regarding any transaction,
                kindly send us an email at <a href="mailto:support@nixoncapital.cc" target="_blank">support@nixoncapital.cc</a>
                <br><br>
                Thank you for choosing our platform. <br>
                Regards,
                {{ config('app.name') }}.
            </td>
        </tr>
        
        <tr>
            <td style="text-align:center;padding:20px 10px">
                {{ config('app.name') }} 2020
            </td>
        </tr>
    </tbody></table>
</div>