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
                <p>Hello {{ $user->name }}</p>
                
            </td>
        </tr>
        <tr>
            <td style="border-collapse:collapse;padding:10px">
                <table width="100%" style="border-collapse:collapse">
                    
                    <tbody>
                    <tr>
                        <td style="padding:15px 10px;border:1px solid #f5f5f5;width:35%">
                            <p> {!! nl2br($text) !!} </p>
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