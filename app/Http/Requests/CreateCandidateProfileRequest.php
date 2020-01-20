<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateCandidateProfileRequest extends Request
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
      'fullname' => 'required',
      'current_salary' => 'required|numeric',
      'expected_salary' => 'required|numeric',
      'experience' => 'required|numeric',
      'birthday' => 'required|date',
      'gender' => 'required',
      'description' => 'required',
      'address' => 'required'
    ];
  }
}
