<?php

namespace AbmmHasan\OTP;

class TOTP
{
    use Common;

    /**
     * Retrieves the QR image for a given name and title.
     *
     * @param string $name The name to generate the QR image for.
     * @param string|null $title The title to be displayed on the QR image. (optional)
     * @return string The QR image URL.
     */
    public function getQRImage(string $name, string $title = null): string
    {
        return $this->getImage('totp', $name, $title);
    }

    /**
     * Generates a one-time password (OTP) based on the given timestamp (or Current Timestamp).
     *
     * @param int|null $input The input value used to generate the OTP. If null, the current timestamp is used.
     * @return int The generated OTP.
     */
    public function getOTP(int $input = null): int
    {
        return $this->getPassword($input ?? time());
    }

    /**
     * Verifies if the given OTP matches the OTP generated by the given timestamp (or Current Timestamp).
     *
     * @param int $otp The OTP to be verified.
     * @param int|null $input The input used to generate the OTP. Defaults to Current Timestamp.
     * @return bool Returns true if the OTP matches the generated OTP, otherwise false.
     */
    public function verify(int $otp, int $input = null): bool
    {
        return $otp === $this->getOTP($input);
    }
}