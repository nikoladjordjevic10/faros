<?php

namespace App\Exceptions;

use Exception;

class NoProductsException extends Exception
{
    /**
     * Report the exception.
     *
     * @return void
     */
     public function report()
     {
        //
    }

    /**
     * Render the exception as an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    { 
      return response()->json(['error' => 'No products available at the moment!', 'id' => $request->id], 500);
    }
}
