<?php

namespace HossamMonir\Pioneer\Contracts;

use Illuminate\Support\Facades\Http;

abstract class PioneerContract
{
    private string $endpoint;

    private string $token;

    /**
     * API constructor.
     */
    public function __construct()
    {
        $this->endpoint = config('pioneer.pioneer_endpoint');
        $this->token = config('pioneer.pioneer_token');
    }

    /**
     * Get Nationalities from Pioneer API
     *
     * @return array|mixed
     */
    public function getNationalities(): mixed
    {
        return Http::baseUrl($this->endpoint)->withToken($this->token)
            ->get('/general/nationalities')
            ->json();
    }

    /**
     * Get Branches from Pioneer API
     *
     * @return array|mixed
     */
    public function getBranches(): mixed
    {
        return Http::baseUrl($this->endpoint)->withToken($this->token)
            ->get('/general/branches')
            ->json();
    }

    /**
     * Get Educational Years from Pioneer API
     *
     * @return array|mixed
     */
    public function getEducationalYears(): mixed
    {
        return Http::baseUrl($this->endpoint)->withToken($this->token)
            ->get('/general/educational-years')
            ->json();
    }

    /**
     * Get Superior from Pioneer API
     *
     * @param string $NationalityNumber
     * @return array|mixed
     */
    protected function getSuperior(string $NationalityNumber): mixed
    {
        return Http::baseUrl($this->endpoint)->withToken($this->token)
            ->post('/general/superior', [
                'NationalityNumber' => $NationalityNumber
            ])
            ->json();
    }

    /**
     * Get Superior Students from Pioneer API
     *
     * @param int $EducationalYearID
     * @param int $SuperiorID
     * @return mixed
     */
    protected function getSuperiorStudents(int $EducationalYearID, int $SuperiorID): mixed
    {
        return Http::baseUrl($this->endpoint)->withToken($this->token)
            ->post('/general/superior/students', [
                'EducationalYearID' => $EducationalYearID,
                'SuperiorID' => $SuperiorID
            ])
            ->json();
    }

    /**
     * Get Students Statement from Pioneer API
     *
     * @param int $EducationalYearID
     * @param int $SuperiorID
     * @return mixed
     */
    protected function getStudentsStatement(int $EducationalYearID, int $SuperiorID): mixed
    {
        return Http::baseUrl($this->endpoint)->withToken($this->token)
            ->post('/accounting/students-statement', [
                'EducationalYearID' => $EducationalYearID,
                'SuperiorID' => $SuperiorID
            ])
            ->json();
    }

    /**
     * Get Summarized Statement from Pioneer API
     *
     * @param int $EducationalYearID
     * @param int $SuperiorID
     * @return mixed
     */
    protected function getSummarizedStatement(int $EducationalYearID, int $SuperiorID): mixed
    {
        return Http::baseUrl($this->endpoint)->withToken($this->token)
            ->post('/accounting/summarized-statement', [
                'EducationalYearID' => $EducationalYearID,
                'SuperiorID' => $SuperiorID
            ])
            ->json();
    }

    /**
     * Get Payments from Pioneer API
     *
     * @param int $EducationalYearID
     * @param int $SuperiorID
     * @param int $ReceiptType
     * @return mixed
     */
    protected function getReceipts(int $EducationalYearID, int $SuperiorID, int $ReceiptType): mixed
    {
        return Http::baseUrl($this->endpoint)->withToken($this->token)
            ->post('/accounting/receipts', [
                'EducationalYearID' => $EducationalYearID,
                'SuperiorID' => $SuperiorID,
                'ReceiptType' => $ReceiptType,
            ])
            ->json();
    }
}
