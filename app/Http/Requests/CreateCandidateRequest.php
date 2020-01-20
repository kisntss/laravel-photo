<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateCandidateRequest extends Request
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'username' => 'required|min:8|unique:candidates,username|unique:employers,username',
      'email' => 'required|unique:candidates,email|unique:employers,email|email',
      'password' => 'required|min:6'
    ];
  }
}
