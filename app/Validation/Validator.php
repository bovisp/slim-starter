<?php

namespace App\Validation;

use Respect\Validation\Exceptions\NestedValidationException;

class Validator
{
	protected $errors = [];

	public function validate($request, $response, array $rules)
	{
		$this->response = $response;
		$this->request = $request;

		foreach ($rules as $field => $rule) {
			try {
				$rule->setName(ucfirst($field))
					->assert($this->request->getParam($field));
			} catch (NestedValidationException $e) {
				$this->errors[$field] = $e->getMessages();
			}
		}

		$_SESSION['errors'] = $this->errors;

		return $this;
	}

	public function failed()
	{
		return !empty($this->errors);
	}

	public function errors()
	{
		return $this->errors;
	}

	public function back()
	{
		return $this->response->withRedirect(
			$this->request->getHeader('HTTP_REFERER')[0]
		);
	}
}