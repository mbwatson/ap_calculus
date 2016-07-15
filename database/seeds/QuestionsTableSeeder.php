<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder {
	public function run()
	{
		DB::table('questions')->delete();

		$seeds = array(
			array(
				'title' => 'Power Series: Convergence & Error Bound',
				'body' => 'The function $f$ is defined by the power series
					$$f(x) = \sum_{n=0}^\infty\frac{(x-2)^n}{3^n(n+1)} = 1 + \frac{x-2}{3 \cdot 2} + \frac{(x-2)^2}{3^2\cdot 3} + \frac{(x-2)^3}{3^3\cdot 4} + \cdots  + \frac{(x-2)^n}{3^n(n+1)} + \cdots$$

(A) Determine the interval of convergence of the power series for $f$. Show the work that leads to your answer.

(B) Find the value of $f\'\'(2)$.

(C) Use the first three nonzero terms of the power series for $f$ to approximate $f(1)$. Use the alternating series error bound to show that this approximation differs from $f(1)$ by less than $\frac{1}{100}$.',
				'user_id' => 1,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'title' => 'An Improper Integral',
				'body' => 'Consider the function $f$ given by $f(x) = xe^{-2x}$ for all $x \geq 0$.
					
(A) Find $\lim_{x\to\infty}f(x)$

(B) Find the maximum value of $f$ for $x \geq 0$. Justify your answer.

(C) Evaluate $\int_0^\infty f(x)\,dx$, or show that the integral diverges.',
				'user_id' => 2,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'title' => 'Power series and $\sin(x)/x$',
				'body' => 'Consider the function defined by $f(x)=\frac{\sin(x)}{x}$.
				
(A) Find a power series representation of $f$ centered at $x=0$.

(B) The power series you found in part (a) is not quite a Maclaurin series for $f$ because $f$ is technically not eligible to have a Maclaurin series. Why?
					
(C) Redefine $f$ as follows: $f(x) = \begin{cases}\frac{\sin(x)}{x} &: x \ne 0;\newline k &: x=0.\end{cases}$ The power series in part (a) will be a Maclaurin series for this newly defined $f$. What is the value of $k$?',
				'user_id' => '1',
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
		);

		DB::table('questions')->insert($seeds);
	}
}