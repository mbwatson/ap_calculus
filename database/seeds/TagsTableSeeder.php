<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder {
	public function run()
	{
		DB::table('tags')->delete();

		$seeds = array(
			// MPACs
			array(
				'type' => 'MPAC',
				'name' => '1',
				'description' => 'Reasoning with definitions and theorems',
				'parent_id' => NULL,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'MPAC',
				'name' => '2',
				'description' => 'Connecting concepts',
				'parent_id' => NULL,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'MPAC',
				'name' => '3',
				'description' => 'Implementing algebraic/computational processes',
				'parent_id' => NULL,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'MPAC',
				'name' => '4',
				'description' => 'Connecting multiple representations',
				'parent_id' => NULL,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'MPAC',
				'name' => '5',
				'description' => 'Building notational fluency',
				'parent_id' => NULL,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'MPAC',
				'name' => '6',
				'description' => 'Communicating',
				'parent_id' => NULL,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			// Big Ideas
			array(
				'type' => 'Big Idea',
				'name' => '1: Limits',
				'description' => 'Many calculus concepts are developed by first considering a discrete model and then the consequences of a limiting case. Therefore, the idea of limits is essential for discovering and developing important ideas, definitions, formulas, and theorems in calculus. Students must have a solid, intuitive understanding of limits and be able to compute various limits, including one-sided limits, limits at infinity, the limit of a sequence, and infinite limits. They should be able to work with tables and graphs in order to estimate the limit of a function at a point. Students should know the algebraic properties of limits and techniques for finding limits of indeterminate forms, and they should be able to apply limits to understand the behavior of a function near a point. Students must also understand how limits are used to determine continuity, a fundamental property of functions.',
				'parent_id' => NULL,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Big Idea',
				'name' => '2: Derivatives',
				'description' => 'Using derivatives to describe the rate of change of one variable with respect to another variable allows students to understand change in a ariety of contexts. In AP Calculus, students build the derivative using the concept of limits and use the derivative primarily to compute the instantaneous rate of change of a function. Applications of the derivative include finding the slope of a tangent line to a graph at a point, analyzing the graph of a function (for example, determining whether a function is increasing or decreasing and finding concavity and extreme values), and solving problems involving rectilinear motion. Students should be able to use different definitions of the derivative, estimate derivatives from tables and graphs, and apply various derivative rules and properties. In addition, students should be able to solve separable differential equations, understand and be able to apply the Mean Value Theorem, and be familiar with a variety of real-world applications, including related rates, optimization, and growth and decay models.',
				'parent_id' => NULL,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Big Idea',
				'name' => '3: Integrals and the Fundamental Theorem of Calculus',
				'description' => 'Integrals are used in a wide variety of practical and theoretical applications. AP Calculus students should understand the definition of a definite integral involving a Riemann sum, be able to approximate a definite integral using different methods, and be able to compute definite integrals using geometry. They should be familiar with basic techniques of integration and properties of integrals. The interpretation of a definite integral is an important skill, and students should be familiar with area, volume, and motion applications, as well as with the use of the definite integral as an accumulation function. It is critical that students grasp the relationship between integration and differentiation as expressed in the Fundamental Theorem of Calculus — a central idea in AP Calculus. Students should be able to work with and analyze functions defined by an integral.',
				'parent_id' => NULL,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Big Idea',
				'name' => '4: Series',
				'description' => 'The AP Calculus BC curriculum includes the study of series of numbers, power series, and various methods to determine convergence or divergence of a series. Students should be familiar with Maclaurin series for common functions and general Taylor series representations. Other topics include the radius and interval of convergence and operations on power series. The technique of using power series to approximate an arbitrary function near a specific value allows for an important connection to the tangent-line problem and is a natural extension that helps achieve a better approximation. The concept of approximation is a common theme throughout AP Calculus, and power series provide a unifying, comprehensive conclusion.',
				'parent_id' => NULL,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			// Enduring Outcomes
			array(
				'type' => 'Enduring Understanding',
				'name' => '1.1',
				'description' => 'The concept of a limit can be used to understand the behavior of functions.',
				'parent_id' => 7,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Enduring Understanding',
				'name' => '1.2',
				'description' => 'Continuity is a key proprety of functions that is defined using limits.',
				'parent_id' => 7,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Enduring Understanding',
				'name' => '2.1',
				'description' => 'The derivative of a function is defined as the limit of a difference quotient and can be determined using a variety of strategies.',
				'parent_id' => 8,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Enduring Understanding',
				'name' => '2.2',
				'description' => 'A function\'s derivative, which is itself a function, can be used to udnerstand the behavior of the function.',
				'parent_id' => 8,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Enduring Understanding',
				'name' => '2.3',
				'description' => 'The derivative has multiple inmterpretations and applications including those that involve instantaneous rates of change.',
				'parent_id' => 8,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Enduring Understanding',
				'name' => '2.4',
				'description' => 'The Mean Value Theorem connects the behavior of a differentiable function over an interval to the behavior of the derivative of that function at a particular point.',
				'parent_id' => 8,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Enduring Understanding',
				'name' => '3.1',
				'description' => 'Antidifferentiation is the inverse process to differentiation.',
				'parent_id' => 9,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Enduring Understanding',
				'name' => '3.2',
				'description' => 'The definite integral of a function over an interval is the limit of a Riemann sum over that interval and can be calculated using a variety of strategies.',
				'parent_id' => 9,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Enduring Understanding',
				'name' => '3.3',
				'description' => 'The Fundamental Theorem of Calculus, which has two distinct formulations, connects differentiation and integration.',
				'parent_id' => 9,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Enduring Understanding',
				'name' => '3.4',
				'description' => 'The definite integralof a function over an interval is a mathematical tool with many interpretations and applications involving accumulation.',
				'parent_id' => 9,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Enduring Understanding',
				'name' => '3.5',
				'description' => 'Antidifferentiation is an underlying concept involved in solving separable differential equations. Solving separable differential equations involves determining a function or relation given its rate of change.',
				'parent_id' => 9,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Enduring Understanding',
				'name' => '4.1',
				'description' => 'The sum of an infinite number of real numbers may converge.',
				'parent_id' => 10,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Enduring Understanding',
				'name' => '4.2',
				'description' => 'A function can be represented by an associated power series over the interval of convergence for the power series.',
				'parent_id' => 10,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			// Learning Objectives
			array(
				'type' => 'Learning Objective',
				'name' => '1.1A(a)',
				'description' => 'Express limits symbolically using correct notation.',
				'parent_id' => 11,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '1.1A(b)',
				'description' => 'Interpret limits expressed symbolically.',
				'parent_id' => 11,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '1.1B',
				'description' => 'Estimate limits of functions.',
				'parent_id' => 11,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '1.1C',
				'description' => 'Determine limits of functions.',
				'parent_id' => 11,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '1.1D',
				'description' => 'Deduce and interpret behavior of functions using limits.',
				'parent_id' => 11,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '1.2A',
				'description' => 'Analyze functions for intervals of continuity or points of discontinuity.',
				'parent_id' => 12,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '1.2B',
				'description' => 'Determine the applicability of important calculus theorems using continuity.',
				'parent_id' => 12,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '2.1A',
				'description' => 'Identify the derivative of a function as the limit of a difference quotient.',
				'parent_id' => 13,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '2.1B',
				'description' => 'Estimate derivatives.',
				'parent_id' => 13,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '2.1C',
				'description' => 'Calculate derivatives.',
				'parent_id' => 13,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '2.1D',
				'description' => 'Determine higher order derivatives.',
				'parent_id' => 13,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '2.2A',
				'description' => 'Use derivatives to analyze properties of a function.',
				'parent_id' => 14,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '2.2B',
				'description' => 'Recognize the connection between differentiability and continuity.',
				'parent_id' => 14,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '2.3A',
				'description' => 'Interpret the meaning of a derivative within a problem.',
				'parent_id' => 15,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '2.3B',
				'description' => 'Solve problems involving the slope of a tangent line.',
				'parent_id' => 15,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '2.3C',
				'description' => 'Solve problems involving related rates, optimization, rectilinear motion, (BC) and planar motion.',
				'parent_id' => 15,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '2.3D',
				'description' => 'Solve problems involving rates of change in applied contexts.',
				'parent_id' => 15,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '2.3E',
				'description' => 'Verify solutions to differential equations.',
				'parent_id' => 15,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '2.3F',
				'description' => 'Estimate solutions to differential equations.',
				'parent_id' => 15,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '2.4A',
				'description' => 'Apply the Mean Value Theorem to describe the behavior of a function over an interval.',
				'parent_id' => 16,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '3.1A',
				'description' => 'Recognize antiderivatives of basic functions.',
				'parent_id' => 17,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '3.2A(a)',
				'description' => 'Interpret the definite integral as the limits of a Riemann sum.',
				'parent_id' => 18,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '3.2A(b)',
				'description' => 'Express the limit of a Riemann sum in integral notation.',
				'parent_id' => 18,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '3.2B',
				'description' => 'Approximate a definite integral.',
				'parent_id' => 18,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '3.2C',
				'description' => 'Calculate a definite integralusing areas and properties of definite integrals.',
				'parent_id' => 18,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '3.2D',
				'description' => '(BC) Evaluate an improper integral or show that an improper integral diverges.',
				'parent_id' => 18,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '3.3A',
				'description' => 'Analyze functions defined by an integral.',
				'parent_id' => 19,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '3.3B(a)',
				'description' => 'Calculate antiderivatives.',
				'parent_id' => 19,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '3.3B(b)',
				'description' => 'Evalute definite integrals.',
				'parent_id' => 19,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '3.4A',
				'description' => 'Interpret the meaning of a definite integral within a problem.',
				'parent_id' => 20,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '3.4B',
				'description' => 'Apply definite integrals to problems involving the average value of a function.',
				'parent_id' => 20,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '3.4C',
				'description' => 'Apply definite integrals to problems involving motion.',
				'parent_id' => 20,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '3.4D',
				'description' => 'Apply definite integrals to problems involving area, volume, (BC) and length of a curve.',
				'parent_id' => 20,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '3.4E',
				'description' => 'Use the definite integral to solve problems in various contexts.',
				'parent_id' => 20,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '3.5A',
				'description' => 'Analyze differential equations to obtain general and specific solutions.',
				'parent_id' => 21,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '3.5B',
				'description' => 'Interpret, create, and solve differential equations from problems in context.',
				'parent_id' => 21,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '4.1A',
				'description' => 'Determine whether a series converges or diverges.',
				'parent_id' => 22,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '4.1B',
				'description' => 'Determine or estimate the sum of a series.',
				'parent_id' => 22,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '4.2A',
				'description' => 'Construct and use Taylor polynomials.',
				'parent_id' => 23,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '4.2B',
				'description' => 'Write a power series representing a given function.',
				'parent_id' => 23,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'type' => 'Learning Objective',
				'name' => '4.2C',
				'description' => 'Determine the radius and interval of convergence of a power series.',
				'parent_id' => 23,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			)		);

		DB::table('tags')->insert($seeds);
	}
}