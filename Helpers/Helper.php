<?php

use App\Traits\MoneyCalculator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use JetBrains\PhpStorm\ArrayShape;

class Helper
{

    use MoneyCalculator;

    /**
     * @param int $statusCode
     * @param string $alert_type
     * @param string $status
     * @param string $message
     * @return array
     */
    #[ArrayShape(['code' => "int", 'alert_type' => "string", 'status' => "bool|string", 'message' => "string"])]
    public static function formatResponse(int $statusCode = 200, string $alert_type = 'success', string $status='Success', string $message = '',) : array
    {
        return [
            'code' => $statusCode,
            'alert_type' => $alert_type,
            'status' => $status,
            'message' => $message,
        ];
    }

    /**
     * @param int $statusCode
     * @param string $alert_type
     * @param string $status
     * @param string $message
     * @return RedirectResponse
     */
    public static function sendResponse(
        int $statusCode=200, string $alert_type = 'success',
        string $status = 'Success', string $message = '') :RedirectResponse
    {
        return Redirect::back()->with(self::formatResponse($statusCode, $alert_type, $status, $message));
    }

    public static function convertToMoney($amount) :string
    {
        return (new Helper)->formatMoney($amount);
    }

    public static function setMoney($amount) :string
    {
        return (new Helper())->moneySetter($amount);
    }

    public static function getCalledClassMethod(bool $fullPath = false, bool $asObj=false) :string
    {
        $backtrace = debug_backtrace()[1];

        $class = $backtrace['class'];
        $method = $backtrace['function'];

        if ($asObj) {
            return (object) [
                'class' => $class,
                'method' => $class,
            ];
        }

        return $fullPath ? "$class::$method" : $method;
    }

}
