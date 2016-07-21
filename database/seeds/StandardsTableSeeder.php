<?php

use Illuminate\Database\Seeder;

class StandardsTableSeeder extends Seeder {
	public function run()
	{
		DB::table('standards')->delete();

		$seeds = array(
			// MPACs
			array(
				'type' => 'MPAC',
				'name' => 'MPAC 1',
				'description' => 'Reasoning with definitions and theorems',
				'details' => '### Students can:

1.	 use definitions and theorems to build arguments, to justify conclusions or answers, and to prove results;
2.	 confirm that hypotheses have been satisfied in order to apply the conclusion of a theorem;
3.	 apply definitions and theorems in the process of solving a problem;
4.	 interpret quantifiers in definitions and theorems (e.g., "for all," "there exists");
5.	 develop conjectures based on exploration with technology; and
6.	 produce examples and counterexamples to clarify understanding of definitions, to investigate whether converses of theorems are true or false, or to test conjectures.',
				'parent_id' => NULL,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'MPAC',
				'name' => 'MPAC 2',
				'description' => 'Connecting concepts',
				'details' => '### Students can:

1.	 relate the concept of a limit to all aspects of calculus;
2.	 use the connection between concepts (e.g., rate of change and accumulation) or processes (e.g., differentiation and its inverse process, antidifferentiation) to solve problems;
3.	 connect concepts to their visual representations with and without technology; and
4.	 identify a common underlying structure in problems involving different contextual situations.',
				'parent_id' => NULL,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'MPAC',
				'name' => 'MPAC 3',
				'description' => 'Implementing algebraic/computational processes',
				'details' => '### Students can:

1.	 select appropriate mathematical strategies;
2.	 sequence algebraic/computational procedures logically;
3.	 complete algebraic/computational processes correctly;
4.	 apply technology strategically to solve problems;
5.	 attend to precision graphically, numerically, analytically, and verbally and specify units of measure; and
6.	 connect the results of algebraic/computational processes to the question asked.',
				'parent_id' => NULL,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'MPAC',
				'name' => 'MPAC 4',
				'description' => 'Connecting multiple representations',
				'details' => '### Students can:

1.	 associate tables, graphs, and symbolic representations of functions;
2.	 develop concepts using graphical, symbolical, verbal, or numerical representations with and without technology;
3.	 identify how mathematical characteristics of functions are related in different representations;
4.	 extract and interpret mathematical content from any presentation of a function (e.g., utilize information from a table of values);
5.	 construct one representational form from another (e.g., a table from a graph or a graph from given information); and
6.	 consider multiple representations (graphical, numerical, analytical, and verbal) of a function to select or construct a useful representation for solving a problem.',
				'parent_id' => NULL,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'MPAC',
				'name' => 'MPAC 5',
				'description' => 'Building notational fluency',
				'details' => '### Students can:

1.	 know and use a variety of notations (e.g., $f\'(x)$, $y\'$, $\tfrac{dy}{dx}$ );
2.	 connect notation to definitions (e.g., relating the notation for the definite integral to that of the limit of a Riemann sum);
3.	 connect notation to different representations (graphical, numerical, analytical, and verbal); and
4.	 assign meaning to notation, accurately interpreting the notation in a given problem and across different contexts.',
				'parent_id' => NULL,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'MPAC',
				'name' => 'MPAC 6',
				'description' => 'Communicating',
				'details' => '### Students can:

1.	 clearly present methods, reasoning, justifications, and conclusions;
2.	 use accurate and precise language and notation;
3.	 explain the meaning of expressions, notation, and results in terms of a context (including units);
4.	 explain the connections among concepts;
5.	 critically interpret and accurately report information provided by technology; and
6.	 analyze, evaluate, and compare the reasoning of others.',
				'parent_id' => NULL,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			// Big Ideas
			array(
				'type' => 'Big Idea',
				'name' => 'Big Idea 1: Limits',
				'description' => 'Many calculus concepts are developed by first considering a discrete model and then the consequences of a limiting case. Therefore, the idea of limits is essential for discovering and developing important ideas, definitions, formulas, and theorems in calculus. ### Students must have a solid, intuitive understanding of limits and be able to compute various limits, including one-sided limits, limits at infinity, the limit of a sequence, and infinite limits. They should be able to work with tables and graphs in order to estimate the limit of a function at a point. ### Students should know the algebraic properties of limits and techniques for finding limits of indeterminate forms, and they should be able to apply limits to understand the behavior of a function near a point. ### Students must also understand how limits are used to determine continuity, a fundamental property of functions.',
				'details' => '',
				'parent_id' => NULL,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Big Idea',
				'name' => 'Big Idea 2: Derivatives',
				'description' => 'Using derivatives to describe the rate of change of one variable with respect to another variable allows students to understand change in a ariety of contexts. In AP Calculus, students build the derivative using the concept of limits and use the derivative primarily to compute the instantaneous rate of change of a function. Applications of the derivative include finding the slope of a tangent line to a graph at a point, analyzing the graph of a function (for example, determining whether a function is increasing or decreasing and finding concavity and extreme values), and solving problems involving rectilinear motion. ### Students should be able to use different definitions of the derivative, estimate derivatives from tables and graphs, and apply various derivative rules and properties. In addition, students should be able to solve separable differential equations, understand and be able to apply the Mean Value Theorem, and be familiar with a variety of real-world applications, including related rates, optimization, and growth and decay models.',
				'details' => '',
				'parent_id' => NULL,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Big Idea',
				'name' => 'Big Idea 3: Integrals and the Fundamental Theorem of Calculus',
				'description' => 'Integrals are used in a wide variety of practical and theoretical applications. AP Calculus students should understand the definition of a definite integral involving a Riemann sum, be able to approximate a definite integral using different methods, and be able to compute definite integrals using geometry. They should be familiar with basic techniques of integration and properties of integrals. The interpretation of a definite integral is an important skill, and students should be familiar with area, volume, and motion applications, as well as with the use of the definite integral as an accumulation function. It is critical that students grasp the relationship between integration and differentiation as expressed in the Fundamental Theorem of Calculus — a central idea in AP Calculus. ### Students should be able to work with and analyze functions defined by an integral.',
				'details' => '',
				'parent_id' => NULL,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Big Idea',
				'name' => 'Big Idea 4: Series',
				'description' => 'The AP Calculus BC curriculum includes the study of series of numbers, power series, and various methods to determine convergence or divergence of a series. ### Students should be familiar with Maclaurin series for common functions and general Taylor series representations. Other topics include the radius and interval of convergence and operations on power series. The technique of using power series to approximate an arbitrary function near a specific value allows for an important connection to the tangent-line problem and is a natural extension that helps achieve a better approximation. The concept of approximation is a common theme throughout AP Calculus, and power series provide a unifying, comprehensive conclusion.',
				'details' => '',
				'parent_id' => NULL,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			// Enduring Understandings
			array(
				'type' => 'Enduring Understanding',
				'name' => 'EU 1.1',
				'description' => 'The concept of a limit can be used to understand the behavior of functions.',
				'details' => '',
				'parent_id' => 7,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Enduring Understanding',
				'name' => 'EU 1.2',
				'description' => 'Continuity is a key proprety of functions that is defined using limits.',
				'details' => '',
				'parent_id' => 7,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Enduring Understanding',
				'name' => 'EU 2.1',
				'description' => 'The derivative of a function is defined as the limit of a difference quotient and can be determined using a variety of strategies.',
				'details' => '',
				'parent_id' => 8,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Enduring Understanding',
				'name' => 'EU 2.2',
				'description' => 'A function\'s derivative, which is itself a function, can be used to udnerstand the behavior of the function.',
				'details' => '',
				'parent_id' => 8,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Enduring Understanding',
				'name' => 'EU 2.3',
				'description' => 'The derivative has multiple inmterpretations and applications including those that involve instantaneous rates of change.',
				'details' => '',
				'parent_id' => 8,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Enduring Understanding',
				'name' => 'EU 2.4',
				'description' => 'The Mean Value Theorem connects the behavior of a differentiable function over an interval to the behavior of the derivative of that function at a particular point.',
				'details' => '',
				'parent_id' => 8,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Enduring Understanding',
				'name' => 'EU 3.1',
				'description' => 'Antidifferentiation is the inverse process to differentiation.',
				'details' => '',
				'parent_id' => 9,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Enduring Understanding',
				'name' => 'EU 3.2',
				'description' => 'The definite integral of a function over an interval is the limit of a Riemann sum over that interval and can be calculated using a variety of strategies.',
				'details' => '',
				'parent_id' => 9,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Enduring Understanding',
				'name' => 'EU 3.3',
				'description' => 'The Fundamental Theorem of Calculus, which has two distinct formulations, connects differentiation and integration.',
				'details' => '',
				'parent_id' => 9,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Enduring Understanding',
				'name' => 'EU 3.4',
				'description' => 'The definite integralof a function over an interval is a mathematical tool with many interpretations and applications involving accumulation.',
				'details' => '',
				'parent_id' => 9,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Enduring Understanding',
				'name' => 'EU 3.5',
				'description' => 'Antidifferentiation is an underlying concept involved in solving separable differential equations. Solving separable differential equations involves determining a function or relation given its rate of change.',
				'details' => '',
				'parent_id' => 9,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Enduring Understanding',
				'name' => 'EU 4.1',
				'description' => 'The sum of an infinite number of real numbers may converge.',
				'details' => '',
				'parent_id' => 10,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Enduring Understanding',
				'name' => 'EU 4.2',
				'description' => 'A function can be represented by an associated power series over the interval of convergence for the power series.',
				'details' => '',
				'parent_id' => 10,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			// Learning Objectives
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 1.1A(a)',
				'description' => 'Express limits symbolically using correct notation.',
				'details' => '**EK 1.1A1:** Given a function $f$, the limit of $f(x)$ as $x$ approaches $c$, is a real number $R$ if $f(x)$ can be made arbitrarily close to $R$ by taking $x$ sufficiently close to $c$ (but not equal to $c$). If the limit exists and is a real number, then the common notation is $\lim_{x\to c}f(x)=R$.

>**EXCLUSION STATEMENT (EK 1.1A1):**
The epsilon-delta definition of a limit is not assessed
on the AP Calculus AB or BC Exam. However, teachers
may include this topic in the course if time permits.

**EK 1.1A2:** The concept of a limit can be extended to include one-sided limits, limits at infinity, and infinite limits.

**EK 1.1A3:**
A limit might not exist for some functions at particular values of . Some ways that the limit might not exist are if the function is unbounded, if the function is oscillating near this value, or if the limit from the left does not equal the limit from the right.

>**EXAMPLES OF LIMITS THAT DO NOT EXIST**
>- $\lim_{x\to0}\frac{1}{x^2} = \infty$
>- $\lim_{x\to0}\frac{\vert x \vert}{x}$ does not exist
>- $\lim-{x\to0}\sin\Big(\frac{1}{x}\Big)$ does not exist
>- $\lim_{x\to0}\frac{1}{x}$ does not exist
',
				'parent_id' => 11,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 1.1A(b)',
				'description' => 'Interpret limits expressed symbolically.',
				'details' => '',
				'parent_id' => 11,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 1.1B',
				'description' => 'Estimate limits of functions.',
				'details' => '',
				'parent_id' => 11,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 1.1C',
				'description' => 'Determine limits of functions.',
				'details' => '',
				'parent_id' => 11,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 1.1D',
				'description' => 'Deduce and interpret behavior of functions using limits.',
				'details' => '',
				'parent_id' => 11,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 1.2A',
				'description' => 'Analyze functions for intervals of continuity or points of discontinuity.',
				'details' => '',
				'parent_id' => 12,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 1.2B',
				'description' => 'Determine the applicability of important calculus theorems using continuity.',
				'details' => '',
				'parent_id' => 12,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 2.1A',
				'description' => 'Identify the derivative of a function as the limit of a difference quotient.',
				'details' => '',
				'parent_id' => 13,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 2.1B',
				'description' => 'Estimate derivatives.',
				'details' => '',
				'parent_id' => 13,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 2.1C',
				'description' => 'Calculate derivatives.',
				'details' => '',
				'parent_id' => 13,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 2.1D',
				'description' => 'Determine higher order derivatives.',
				'details' => '',
				'parent_id' => 13,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 2.2A',
				'description' => 'Use derivatives to analyze properties of a function.',
				'details' => '',
				'parent_id' => 14,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 2.2B',
				'description' => 'Recognize the connection between differentiability and continuity.',
				'details' => '',
				'parent_id' => 14,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 2.3A',
				'description' => 'Interpret the meaning of a derivative within a problem.',
				'details' => '',
				'parent_id' => 15,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 2.3B',
				'description' => 'Solve problems involving the slope of a tangent line.',
				'details' => '',
				'parent_id' => 15,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 2.3C',
				'description' => 'Solve problems involving related rates, optimization, rectilinear motion, (BC) and planar motion.',
				'details' => '',
				'parent_id' => 15,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 2.3D',
				'description' => 'Solve problems involving rates of change in applied contexts.',
				'details' => '',
				'parent_id' => 15,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 2.3E',
				'description' => 'Verify solutions to differential equations.',
				'details' => '',
				'parent_id' => 15,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 2.3F',
				'description' => 'Estimate solutions to differential equations.',
				'details' => '',
				'parent_id' => 15,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 2.4A',
				'description' => 'Apply the Mean Value Theorem to describe the behavior of a function over an interval.',
				'details' => '',
				'parent_id' => 16,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 3.1A',
				'description' => 'Recognize antiderivatives of basic functions.',
				'details' => '',
				'parent_id' => 17,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 3.2A(a)',
				'description' => 'Interpret the definite integral as the limits of a Riemann sum.',
				'details' => '',
				'parent_id' => 18,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 3.2A(b)',
				'description' => 'Express the limit of a Riemann sum in integral notation.',
				'details' => '',
				'parent_id' => 18,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 3.2B',
				'description' => 'Approximate a definite integral.',
				'details' => '',
				'parent_id' => 18,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 3.2C',
				'description' => 'Calculate a definite integralusing areas and properties of definite integrals.',
				'details' => '',
				'parent_id' => 18,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 3.2D',
				'description' => '(BC) Evaluate an improper integral or show that an improper integral diverges.',
				'details' => '',
				'parent_id' => 18,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 3.3A',
				'description' => 'Analyze functions defined by an integral.',
				'details' => '',
				'parent_id' => 19,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 3.3B(a)',
				'description' => 'Calculate antiderivatives.',
				'details' => '',
				'parent_id' => 19,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 3.3B(b)',
				'description' => 'Evalute definite integrals.',
				'details' => '',
				'parent_id' => 19,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 3.4A',
				'description' => 'Interpret the meaning of a definite integral within a problem.',
				'details' => '',
				'parent_id' => 20,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 3.4B',
				'description' => 'Apply definite integrals to problems involving the average value of a function.',
				'details' => '',
				'parent_id' => 20,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 3.4C',
				'description' => 'Apply definite integrals to problems involving motion.',
				'details' => '',
				'parent_id' => 20,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 3.4D',
				'description' => 'Apply definite integrals to problems involving area, volume, (BC) and length of a curve.',
				'details' => '',
				'parent_id' => 20,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 3.4E',
				'description' => 'Use the definite integral to solve problems in various contexts.',
				'details' => '',
				'parent_id' => 20,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 3.5A',
				'description' => 'Analyze differential equations to obtain general and specific solutions.',
				'details' => '',
				'parent_id' => 21,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 3.5B',
				'description' => 'Interpret, create, and solve differential equations from problems in context.',
				'details' => '',
				'parent_id' => 21,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 4.1A',
				'description' => 'Determine whether a series converges or diverges.',
				'details' => '',
				'parent_id' => 22,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 4.1B',
				'description' => 'Determine or estimate the sum of a series.',
				'details' => '',
				'parent_id' => 22,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 4.2A',
				'description' => 'Construct and use Taylor polynomials.',
				'details' => '',
				'parent_id' => 23,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 4.2B',
				'description' => 'Write a power series representing a given function.',
				'details' => '',
				'parent_id' => 23,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => 'LO 4.2C',
				'description' => 'Determine the radius and interval of convergence of a power series.',
				'details' => '',
				'parent_id' => 23,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			)		);

		DB::table('standards')->insert($seeds);
	}
}