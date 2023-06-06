<?php
    namespace App\Services;

    use App\Models\TestModel;

    class TestService {

        public function store($data): TestModel
        {
            $response = TestModel::create($data);
            return $response;
        }
    }
