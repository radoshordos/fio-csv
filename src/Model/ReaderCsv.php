<?php


namespace Model;

use RuntimeException;

class ReaderCsv
{
    public function loadSource(string $url): string
    {
        $fileContent = file_get_contents($url, false, stream_context_create([
            'http' => [
                'method' => 'GET',
                'header' => "User-Agent: PHP FIO READER\r\n"
            ]
        ]));

        if ($fileContent === false) {
            throw new RuntimeException('Error downloading file');
        }

        return $fileContent;
    }

    public function readCsv(string $str): array
    {
        $arr = [];
        $rows = explode(PHP_EOL, $str);
        $data = array_map('str_getcsv', $rows);
        array_shift($data);
        foreach ($data as $row) {
            if (!is_null($row[0])) {
                $arr[] = new Person($row[0], $row[1], $row[2], $row[3], $row[4]);
            }
        }
        return $arr;
    }
}