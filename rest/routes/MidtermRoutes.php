<?php

Flight::route('GET /conn', function () {
    Flight::midtermService();
});

Flight::route('GET /investors', function () {
    /** TODO
     * write a query that will list all investors
     *
     * This endpoint should return output in JSON format
     */
    Flight::json((Flight::midtermService())->get_investors());
});

Flight::route('GET /investors/@id', function ($id) {
    /** TODO
     * write a query that will list investor by given id
     *
     * This endpoint should return output in JSON format
     */
    Flight::json((Flight::midtermService())->get_investor_by_id($id));
});

Flight::route('POST /transfer', function () {
    /** TODO
     * write a query that will save transfer to transfers table
     *
     * This endpoint should return output in JSON format
     */
    $data = Flight::request()->data->getData();
    Flight::json(Flight::midtermService()->add_transfer($data));
});

Flight::route('GET /transfers', function () {
    /** TODO
     * write a query that will list all transfers
     *
     * This endpoint should return output in JSON format
     */
    Flight::json((Flight::midtermService())->get_transfers());
});
