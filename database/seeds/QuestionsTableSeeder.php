<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder {
	public function run()
	{
		DB::table('questions')->delete();

		$seeds = array(
			array(
				'title' => 'A Differential Equation',
				'body' => 'Which of the following is the solution to the differential equation $\frac{dy}{dx} = y \sec^2(x)$ with the initial condition $y = \Big(\frac{\pi}{4}\Big)=-1$?
					(A) $y = -e^{\tan(x)}$
					(B) $y = -e^{(-1+\tan(x))}$
					(C) $y = -e^{(\sec^3(x)-2\sqrt{2})/3}$
					(D) $y = -\sqrt{2\tan(x)-1}$',
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
		);

		DB::table('questions')->insert($seeds);
	}
}