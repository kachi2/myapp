<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

use Illuminate\Support\Facades\Route;

Route::get('/index', 'WelcomeController@index')->name('index');
Auth::routes(['verify' => true]);

route::post('/user/register', 'Auth\RegisterController@create_user')->name('register_user');
Route::get('complete-registration', 'Auth\CompleteRegistrationController@index')->name('complete_registration');
Route::post('complete-registration', 'Auth\CompleteRegistrationController@update')->name('complete_registration');

Route::get('/about', 'AboutController@index')->name('about');
Route::get('/terms', 'TermsController@index')->name('terms');
Route::get('/faq', 'FaqController@index')->name('faq');
Route::get('/plans', 'WelcomeController@plans')->name('plans');
Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('/contact/store', 'ContactController@store')->name('contact.store');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@VerifyOTP')->name('verify.otp');

Route::get('/verifyotp', 'HomeController@VerifyOTP')->name('verify.otp');
Route::post('/verify/login/otp', 'HomeController@OTPverify')->name('verify.login.otp');

Route::get('withdrawals', 'WithdrawController@index')->name('withdrawals');
Route::get('withdrawals/request', 'WithdrawController@request')->name('withdrawals.request');
Route::post('withdrawals/request', 'WithdrawController@store')->name('withdrawals.request');
Route::post('withdrawals/{id}/cancel', 'WithdrawController@cancel')->name('withdrawals.cancel');
Route::get('deposits', 'DepositController@index')->name('deposits');
Route::get('deposits/coinpayment/transaction/{id}', 'DepositController@showCoinpaymentTransaction')->name('deposits.coinpayment_transaction');
Route::get('deposits/blockchain/transaction/{ref}', 'DepositController@showBlockChainTransaction')->name('deposits.blockchain_transaction');
Route::get('deposits/invest/{id?}', 'DepositController@invest')->name('deposits.invest');
Route::post('/wallet/deposits/request', 'WalletDepositController@investFromCripto')->name('wallet.deposits');
Route::post('deposits/invest/{id?}', 'DepositController@doInvest')->name('deposits.invests');
Route::get('/payouts/details/{id?}', 'DepositController@PayoutsDetails')->name('payouts.details');
Route::post('/transfer/payouts/{id}', 'DepositController@TransferPayouts')->name('transfer.payouts');
Route::get('/withdrawals/details/{id}', 'WithdrawController@Details')->name('withdrawals.details');
Route::get('deposits/transactions', 'DepositController@showTransactions')->name('deposits.transactions');
Route::get('deposits/{ref}', 'DepositController@show')->name('deposit');
//
Route::get('card/deposits/', 'DepositController@CardDeposit')->name('card.deposit');
Route::post('card/deposits/initiate', 'DepositController@CardDepositInitiate')->name('card.deposit.initiate');
Route::post('card/deposits/complete', 'DepositController@OTPverify')->name('card.deposit.complete');

Route::post('card/transfer/complete', 'WalletController@VerifyTransfer')->name('card.transfer.complete');
Route::get('/verify/accounts', 'WalletController@verifyAccount')->name('verifyTransferAccount');

///
Route::get('deposits/transactions/{ref}', 'DepositController@showTransaction')->name('deposits.transaction');
Route::get('deposits/payment/confirmation/{id}','DepositController@saveHashNo')->name('saveHashNo');

Route::get('payouts', 'PayoutController@index')->name('payouts');
Route::get('referral', 'ReferralController@index')->name('referral');
Route::get('bonus/initate/{id}', 'ReferralController@BonusInvest')->name('bonus.initate');
Route::get('referrals/refer', 'ReferralController@refer')->name('referrals.refer');
Route::post('referrals/refer', 'ReferralController@send')->name('referrals.refer');

Route::get('/martets', 'HomeController@Markets')->name('home.markets');
Route::get('user/notifications', 'AccountController@UserNotifications')->name('user.notifications');

Route::get('testimonies', 'TestimonyController@index')->name('testimonies');
Route::get('testimonies/add', 'TestimonyController@addTestimony')->name('testimonies.add');
Route::post('testimonies/add', 'TestimonyController@storeTestimony')->name('testimonies.add');
Route::get('testimonies/{id}/edit', 'TestimonyController@editTestimony')->name('testimonies.edit');
Route::post('testimonies/{id}/edit', 'TestimonyController@updateTestimony')->name('testimonies.edit');
Route::post('testimonies/{id}/delete', 'TestimonyController@destroyTestimony')->name('testimonies.delete');
Route::get('internal-transfer', 'WalletController@transfer')->name('transfer');
Route::get('user/transactions', 'WalletController@transactions')->name('transactions');

Route::post('internal-transfer', 'WalletController@doTransfer')->name('transfer');
Route::post('bonus-transfer', 'WalletController@TransferEarnings')->name('transfer.earnings');
Route::get('earnbonus', 'WalletController@Bonus')->name('earn.bonus'); 

Route::get('account', 'AccountController@index')->name('account');
Route::get('account/activities', 'AccountController@activity')->name('account.activities');
Route::get('settings/profile', 'Settings\ProfileController@index')->name('setting.profile');
Route::post('settings/profile', 'Settings\ProfileController@update')->name('setting.profile');
Route::get('settings/password', 'Settings\PasswordController@index')->name('setting.password');
Route::post('settings/password', 'Settings\PasswordController@update')->name('setting.password');
Route::get('settings/wallet', 'Settings\WalletController@index')->name('setting.wallet');
Route::post('settings/wallet', 'Settings\WalletController@update')->name('setting.wallet');
Route::get('token', 'TokenController@index')->name('token');
Route::post('token', 'TokenController@generate')->name('token');

Route::get('user-photo/{id}/{file_name}', 'AccountController@showPhoto')->name('user.photo');
Route::post('user-photo/store', 'AccountController@StorePhoto')->name('Store.photo');
Route::get('perfect-money/callback', 'PerfectMoneyController@validateIpn')->name('perfect_money.callback');
Route::get('blockchain/callback', 'BlockChainPaymentController@callback')->name('blockchain.callback');
Route::get('user/packages', 'HomeController@packages')->name('user.packages');
Route::get('/user/clear/notifications', 'WalletController@clearNotifications')->name('create.notifications');
Route::get('/user/messages', 'MessageController@index')->name('users.messages.index');
Route::post('/user/send/message', 'MessageController@SendMessage')->name('users.send.message');
Route::get('/user/agent', 'MessageController@Agent')->name('users.agent');


