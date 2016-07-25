<?php

use Illuminate\Database\Seeder;

class StandardsTableSeeder extends Seeder {
	public function run()
	{
		DB::table('standards')->delete();

		$seeds = array(
			// MPACs
			array(
				'id' => 1,
				'type' => 'MPAC',
				'name' => 'MPAC 1',
				'description' => 'Reasoning with definitions and theorems',
				'details' => '
### Students can:

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
				'id' => 2,
				'type' => 'MPAC',
				'name' => 'MPAC 2',
				'description' => 'Connecting concepts',
				'details' => '
### Students can:

1.	 relate the concept of a limit to all aspects of calculus;
2.	 use the connection between concepts (e.g., rate of change and accumulation) or processes (e.g., differentiation and its inverse process, antidifferentiation) to solve problems;
3.	 connect concepts to their visual representations with and without technology; and
4.	 identify a common underlying structure in problems involving different contextual situations.',
				'parent_id' => NULL,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 3,
				'type' => 'MPAC',
				'name' => 'MPAC 3',
				'description' => 'Implementing algebraic/computational processes',
				'details' => '
### Students can:

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
				'id' => 4,
				'type' => 'MPAC',
				'name' => 'MPAC 4',
				'description' => 'Connecting multiple representations',
				'details' => '
### Students can:

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
				'id' => 5,
				'type' => 'MPAC',
				'name' => 'MPAC 5',
				'description' => 'Building notational fluency',
				'details' => '
### Students can:

1.	 know and use a variety of notations (e.g., $f\'(x)$, $y\'$, $\tfrac{dy}{dx}$ );
2.	 connect notation to definitions (e.g., relating the notation for the definite integral to that of the limit of a Riemann sum);
3.	 connect notation to different representations (graphical, numerical, analytical, and verbal); and
4.	 assign meaning to notation, accurately interpreting the notation in a given problem and across different contexts.',
				'parent_id' => NULL,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 6,
				'type' => 'MPAC',
				'name' => 'MPAC 6',
				'description' => 'Communicating',
				'details' => '
### Students can:

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
				'id' => 7,
				'type' => 'Big Idea',
				'name' => 'Big Idea 1',
				'description' => 'Limits',
				'details' => '
#### Many calculus concepts are developed by first considering a discrete model and then the consequences of a limiting case. Therefore, the idea of limits is essential for discovering and developing important ideas, definitions, formulas, and theorems in calculus.

#### Students must have a solid, intuitive understanding of limits and be able to compute various limits, including one-sided limits, limits at infinity, the limit of a sequence, and infinite limits. They should be able to work with tables and graphs in order to estimate the limit of a function at a point. 

#### Students should know the algebraic properties of limits and techniques for finding limits of indeterminate forms, and they should be able to apply limits to understand the behavior of a function near a point.

#### Students must also understand how limits are used to determine continuity, a fundamental property of functions.',
				'parent_id' => NULL,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 8,
				'type' => 'Big Idea',
				'name' => 'Big Idea 2',
				'description' => 'Derivatives',
				'details' => '
#### Using derivatives to describe the rate of change of one variable with respect to another variable allows students to understand change in a ariety of contexts. In AP Calculus, students build the derivative using the concept of limits and use the derivative primarily to compute the instantaneous rate of change of a function. Applications of the derivative include finding the slope of a tangent line to a graph at a point, analyzing the graph of a function (for example, determining whether a function is increasing or decreasing and finding concavity and extreme values), and solving problems involving rectilinear motion. 

#### Students should be able to use different definitions of the derivative, estimate derivatives from tables and graphs, and apply various derivative rules and properties. In addition, students should be able to solve separable differential equations, understand and be able to apply the Mean Value Theorem, and be familiar with a variety of real-world applications, including related rates, optimization, and growth and decay models.',
				'parent_id' => NULL,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 9,
				'type' => 'Big Idea',
				'name' => 'Big Idea 3',
				'description' => 'Integrals and the Fundamental Theorem of Calculus',
				'details' => '
#### Integrals are used in a wide variety of practical and theoretical applications. AP Calculus students should understand the definition of a definite integral involving a Riemann sum, be able to approximate a definite integral using different methods, and be able to compute definite integrals using geometry. They should be familiar with basic techniques of integration and properties of integrals. The interpretation of a definite integral is an important skill, and students should be familiar with area, volume, and motion applications, as well as with the use of the definite integral as an accumulation function. It is critical that students grasp the relationship between integration and differentiation as expressed in the Fundamental Theorem of Calculus — a central idea in AP Calculus. 

#### Students should be able to work with and analyze functions defined by an integral.',
				'parent_id' => NULL,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 10,
				'type' => 'Big Idea',
				'name' => 'Big Idea 4',
				'description' => 'Series',
				'details' => '
#### The AP Calculus BC curriculum includes the study of series of numbers, power series, and various methods to determine convergence or divergence of a series. 

#### Students should be familiar with Maclaurin series for common functions and general Taylor series representations. Other topics include the radius and interval of convergence and operations on power series. The technique of using power series to approximate an arbitrary function near a specific value allows for an important connection to the tangent-line problem and is a natural extension that helps achieve a better approximation. The concept of approximation is a common theme throughout AP Calculus, and power series provide a unifying, comprehensive conclusion.',
				'parent_id' => NULL,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			// Enduring Understandings
			array(
				'id' => 11,
				'type' => 'Enduring Understanding',
				'name' => 'EU 1.1',
				'description' => 'The concept of a limit can be used to understand the behavior of functions.',
				'details' => '',
				'parent_id' => 7,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 12,
				'type' => 'Enduring Understanding',
				'name' => 'EU 1.2',
				'description' => 'Continuity is a key proprety of functions that is defined using limits.',
				'details' => '',
				'parent_id' => 7,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 13,
				'type' => 'Enduring Understanding',
				'name' => 'EU 2.1',
				'description' => 'The derivative of a function is defined as the limit of a difference quotient and can be determined using a variety of strategies.',
				'details' => '',
				'parent_id' => 8,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 14,
				'type' => 'Enduring Understanding',
				'name' => 'EU 2.2',
				'description' => 'A function\'s derivative, which is itself a function, can be used to udnerstand the behavior of the function.',
				'details' => '',
				'parent_id' => 8,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 15,
				'type' => 'Enduring Understanding',
				'name' => 'EU 2.3',
				'description' => 'The derivative has multiple inmterpretations and applications including those that involve instantaneous rates of change.',
				'details' => '',
				'parent_id' => 8,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 16,
				'type' => 'Enduring Understanding',
				'name' => 'EU 2.4',
				'description' => 'The Mean Value Theorem connects the behavior of a differentiable function over an interval to the behavior of the derivative of that function at a particular point.',
				'details' => '',
				'parent_id' => 8,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 17,
				'type' => 'Enduring Understanding',
				'name' => 'EU 3.1',
				'description' => 'Antidifferentiation is the inverse process to differentiation.',
				'details' => '',
				'parent_id' => 9,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 18,
				'type' => 'Enduring Understanding',
				'name' => 'EU 3.2',
				'description' => 'The definite integral of a function over an interval is the limit of a Riemann sum over that interval and can be calculated using a variety of strategies.',
				'details' => '',
				'parent_id' => 9,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 19,
				'type' => 'Enduring Understanding',
				'name' => 'EU 3.3',
				'description' => 'The Fundamental Theorem of Calculus, which has two distinct formulations, connects differentiation and integration.',
				'details' => '',
				'parent_id' => 9,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 20,
				'type' => 'Enduring Understanding',
				'name' => 'EU 3.4',
				'description' => 'The definite integralof a function over an interval is a mathematical tool with many interpretations and applications involving accumulation.',
				'details' => '',
				'parent_id' => 9,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 21,
				'type' => 'Enduring Understanding',
				'name' => 'EU 3.5',
				'description' => 'Antidifferentiation is an underlying concept involved in solving separable differential equations. Solving separable differential equations involves determining a function or relation given its rate of change.',
				'details' => '',
				'parent_id' => 9,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 22,
				'type' => 'Enduring Understanding',
				'name' => 'EU 4.1',
				'description' => 'The sum of an infinite number of real numbers may converge.',
				'details' => '',
				'parent_id' => 10,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 23,
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
				'id' => 24,
				'type' => 'Learning Objective',
				'name' => 'LO 1.1A(a)',
				'description' => 'Express limits symbolically using correct notation.',
				'details' => '
**EK 1.1A1:** Given a function $f$, the limit of $f(x)$ as $x$ approaches $c$, is a real number $R$ if $f(x)$ can be made arbitrarily close to $R$ by taking $x$ sufficiently close to $c$ (but not equal to $c$). If the limit exists and is a real number, then the common notation is $\lim_{x\to c}f(x)=R$.

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
>- $\lim_{x\to0}\frac{1}{x}$ does not exist',
				'parent_id' => 11,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 25,
				'type' => 'Learning Objective',
				'name' => 'LO 1.1A(b)',
				'description' => 'Interpret limits expressed symbolically.',
				'details' => '
**EK 1.1A1:** Given a function $f$, the limit of $f(x)$ as $x$ approaches $c$, is a real number $R$ if $f(x)$ can be made arbitrarily close to $R$ by taking $x$ sufficiently close to $c$ (but not equal to $c$). If the limit exists and is a real number, then the common notation is $\lim_{x\to c}f(x)=R$.

>**EXCLUSION STATEMENT (EK 1.1A1):**
The epsilon-delta definition of a limit is not assessed
on the AP Calculus AB or BC Exam. However, teachers
may include this topic in the course if time permits.

**EK 1.1A2:** The concept of a limit can be extended to include one-sided limits, limits at infinity, and infinite limits.

**EK 1.1A3:** A limit might not exist for some functions at particular values of . Some ways that the limit might not exist are if the function is unbounded, if the function is oscillating near this value, or if the limit from the left does not equal the limit from the right.

>**EXAMPLES OF LIMITS THAT DO NOT EXIST**
>- $\lim_{x\to0}\frac{1}{x^2} = \infty$
>- $\lim_{x\to0}\frac{\vert x \vert}{x}$ does not exist
>- $\lim-{x\to0}\sin\Big(\frac{1}{x}\Big)$ does not exist
>- $\lim_{x\to0}\frac{1}{x}$ does not exist',
				'parent_id' => 11,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 26,
				'type' => 'Learning Objective',
				'name' => 'LO 1.1B',
				'description' => 'Estimate limits of functions.',
				'details' => '**EK 1.1B1:** Numerical and graphical information can be used to estimate limits.',
				'parent_id' => 11,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 27,
				'type' => 'Learning Objective',
				'name' => 'LO 1.1C',
				'description' => 'Determine limits of functions.',
				'details' => '
**EK1.1C1:** Limits of sums, differences, products, quotients, and composite functions can be found using the basic theorems of limits and algebraic rules.

**EK 1.1C2:** The limit of a function may be found by using algebraic manipulation, alternate forms of trigonometric functions, or the squeeze theorem.

**EK 1.1C3:** Limits of the indeterminate forms $\tfrac{0}{0}$ and $\tfrac{\infty}{\infty}$ may be evaluated using L’H&ocirc;pital’s Rule.',
				'parent_id' => 11,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 28,
				'type' => 'Learning Objective',
				'name' => 'LO 1.1D',
				'description' => 'Deduce and interpret behavior of functions using limits.',
				'details' => '
**EK 1.1D1:** Asymptotic and unbounded behavior of functions can be explained and described using limits.

**EK 1.1D2:** Relative magnitudes of functions and their rates of change can be compared using limits.',
				'parent_id' => 11,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 29,
				'type' => 'Learning Objective',
				'name' => 'LO 1.2A',
				'description' => 'Analyze functions for intervals of continuity or points of discontinuity.',
				'details' => '
**EK 1.2A1:** A function $f$ is continuous at $x=c$ provided that $f(c)$ exists, $\lim_{x \to c}f(x)$ exists and $\lim_{x \to c}f(x) = f(c)$.

**EK 1.2A2:** Polynomial, rational, power, exponential, logarithmic, and trigonometric functions are continuous at all points in their domains.

**EK 1.2A3:** Types of discontinuities include removable discontinuities, jump discontinuities, and discontinuities due to vertical asymptotes.',
				'parent_id' => 12,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 30,
				'type' => 'Learning Objective',
				'name' => 'LO 1.2B',
				'description' => 'Determine the applicability of important calculus theorems using continuity.',
				'details' => '**EK 1.2B1:** Continuity is an essential condition for theorems such as the Intermediate Value Theorem, the Extreme Value Theorem, and the Mean Value Theorem.',
				'parent_id' => 12,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 31,
				'type' => 'Learning Objective',
				'name' => 'LO 2.1A',
				'description' => 'Identify the derivative of a function as the limit of a difference quotient.',
				'details' => '
**EK 2.1A1:** The difference quotients $\frac{f(a+h)-f(a)}{h}$ and $\frac{f(x)-f(a)}{x-a}$ express the average rate of change of a function over an interval.

**EK 2.1A2:** The instantaneous rate of change of a function at a point can be expressed by $\lim_{h \to 0}\frac{f(a+h)-f(a)}{h}$ or $\lim_{x \to a}\frac{f(x)-f(a)}{x-a}$, provided that the limit exists. These are common forms of the definition of the derivative and are denoted $f\'(a)$.

**EK 2.1A3:** The derivative of $f$ is the function whose value at $x$ is $\lim_{h \to 0}\frac{f(x+h)-f(x)}{h}$, provided this limit exists.

**EK 2.1A4:** For $y = f(x)$, notations for the derivative include $\frac{dy}{dx}$, $f\'(x)$, and $y\'$.

**EK 2.1A5:** The derivative can be represented graphically, numerically, analytically, and verbally.',
				'parent_id' => 13,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 32,
				'type' => 'Learning Objective',
				'name' => 'LO 2.1B',
				'description' => 'Estimate derivatives.',
				'details' => '**EK 2.1B1:** The derivative at a point can be estimated from information given in tables or graphs.',
				'parent_id' => 13,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 33,
				'type' => 'Learning Objective',
				'name' => 'LO 2.1C',
				'description' => 'Calculate derivatives.',
				'details' => '
**EK 2.1C1:** Direct application of the definition of the derivative can be used to find the derivative for selected functions, including polynomial, power, sine, cosine, exponential, and logarithmic functions.

**EK 2.1C2:** Specific rules can be used to calculate derivatives for classes of functions, including polynomial, rational, power, exponential, logarithmic, trigonometric, and inverse trigonometric.

**EK 2.1C3:** Sums, differences, products, and quotients of functions can be differentiated using derivative rules.

**EK 2.1C4:** The chain rule provides a way to differentiate composite functions.

**EK 2.1C5:** The chain rule is the basis for implicit differentiation.

**EK 2.1C6:** The chain rule can be used to find the derivative of an inverse function, provided the derivative of that function exists.

**EK 2.1C7: (BC)** Methods for calculating derivatives of real-valued functions can be extended to vector-valued functions, parametric functions, and functions in polar coordinates.',
				'parent_id' => 13,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 34,
				'type' => 'Learning Objective',
				'name' => 'LO 2.1D',
				'description' => 'Determine higher order derivatives.',
				'details' => '
**EK 2.1D1:** Differentiating $f\'$ produces the second derivative $f\'\'$, provided the derivative of $f\'$ exists; repeating this process produces higher order derivatives of $f$.

**EK 2.1D2:** Higher order derivatives are represented with a variety of notations. For $y = f(x)$, notations for the second derivative include $\frac{d^2y}{dx^2}$, $f\'\'(x)$, and $y\'\'$. Higher order derivatives can be denoted $\frac{d^ny}{dx^n}$ or $f^{(n)(x)}$.',
				'parent_id' => 13,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 35,
				'type' => 'Learning Objective',
				'name' => 'LO 2.2A',
				'description' => 'Use derivatives to analyze properties of a function.',
				'details' => '
**EK 2.2A1:** First and second derivatives of a function can derivatives to analyze provide information about the function and its graph properties of a function, including intervals of increase or decrease, local (relative) and global (absolute) extrema, intervals of upward or downward concavity, and points of inflection.

**EK 2.2A2:** Key features of functions and their derivatives can be identified and related to their graphical, numerical, and analytical representations.

**EK 2.2A3:** Key features of the graphs of $f$, $f\'$, and $f\'\'$ are related to one another.

**EK 2.2A4: (BC)** For a curve given by a polar equation $r = f(\theta)$, derivatives of $r$, $x$, and $y$ with respect to $\theta$ and first and second derivatives of $y$ with respect to $x$ can provide information about the curve.',
				'parent_id' => 14,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 36,
				'type' => 'Learning Objective',
				'name' => 'LO 2.2B',
				'description' => 'Recognize the connection between differentiability and continuity.',
				'details' => '
**EK 2.2B1:** A continuous function may fail to be differentiable at a point in its domain.

**EK 2.2B2:** If a function is differentiable at a point, then it is continuous at that point.',
				'parent_id' => 14,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 37,
				'type' => 'Learning Objective',
				'name' => 'LO 2.3A',
				'description' => 'Interpret the meaning of a derivative within a problem.',
				'details' => '
**EK 2.3B1:** The derivative at a point is the slope of the line tangent to a graph at that point on the graph.

**EK 2.3B2:** The tangent line is the graph of a locally linear approximation of the function near the point of tangency.',
				'parent_id' => 15,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 38,
				'type' => 'Learning Objective',
				'name' => 'LO 2.3B',
				'description' => 'Solve problems involving the slope of a tangent line.',
				'details' => '',
				'parent_id' => 15,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 39,
				'type' => 'Learning Objective',
				'name' => 'LO 2.3C',
				'description' => 'Solve problems involving related rates, optimization, rectilinear motion, (BC) and planar motion.',
				'details' => '
**EK 2.3C1:** The derivative can be used to solve rectilinear motion problems involving position, speed, velocity, and acceleration.

**EK 2.3C2:** The derivative can be used to solve related rates problems, that is, finding a rate at which one quantity is changing by relating it to other quantities whose rates of change are known.

**EK 2.3C3:** The derivative can be used to solve optimization problems, that is, finding a maximum or minimum value of a function over a given interval.

**EK 2.3C4: (BC)** Derivatives can be used to determine velocity, speed, and acceleration for a particle moving along curves given by parametric or vector-valued functions.',
				'parent_id' => 15,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 40,
				'type' => 'Learning Objective',
				'name' => 'LO 2.3D',
				'description' => 'Solve problems involving rates of change in applied contexts.',
				'details' => '**EK 2.3D1:** The derivative can be used to express information about rates of change in applied contexts.',
				'parent_id' => 15,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 41,
				'type' => 'Learning Objective',
				'name' => 'LO 2.3E',
				'description' => 'Verify solutions to differential equations.',
				'details' => '
**EK 2.3E1:** Solutions to differential equations are functions or families of functions.

**EK 2.3E2:** Derivatives can be used to verify that a function is a solution to a given differential equation.',
				'parent_id' => 15,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 42,
				'type' => 'Learning Objective',
				'name' => 'LO 2.3F',
				'description' => 'Estimate solutions to differential equations.',
				'details' => '
**EK 2.3F1:** Slope fields provide visual clues to the behavior of solutions to first order differential equations.

**EK 2.3F2: (BC)** For differential equations, Euler’s method provides a procedure for approximating a solution or a point on a solution curve.',
				'parent_id' => 15,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 43,
				'type' => 'Learning Objective',
				'name' => 'LO 2.4A',
				'description' => 'Apply the Mean Value Theorem to describe the behavior of a function over an interval.',
				'details' => '**EK 2.4A1:** If a function is continuous over the interval $[a,b]$ and differentiable over the interval $(a,b)$, the Mean Value Theorem guarantees a point within that open interval where the instantaneous rate of change equals the average rate of change over the interval.',
				'parent_id' => 16,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 44,
				'type' => 'Learning Objective',
				'name' => 'LO 3.1A',
				'description' => 'Recognize antiderivatives of basic functions.',
				'details' => '',
				'parent_id' => 17,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 45,
				'type' => 'Learning Objective',
				'name' => 'LO 3.2A(a)',
				'description' => 'Interpret the definite integral as the limits of a Riemann sum.',
				'details' => '',
				'parent_id' => 18,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 46,
				'type' => 'Learning Objective',
				'name' => 'LO 3.2A(b)',
				'description' => 'Express the limit of a Riemann sum in integral notation.',
				'details' => '',
				'parent_id' => 18,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 47,
				'type' => 'Learning Objective',
				'name' => 'LO 3.2B',
				'description' => 'Approximate a definite integral.',
				'details' => '',
				'parent_id' => 18,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 48,
				'type' => 'Learning Objective',
				'name' => 'LO 3.2C',
				'description' => 'Calculate a definite integralusing areas and properties of definite integrals.',
				'details' => '',
				'parent_id' => 18,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 49,
				'type' => 'Learning Objective',
				'name' => 'LO 3.2D',
				'description' => '(BC) Evaluate an improper integral or show that an improper integral diverges.',
				'details' => '',
				'parent_id' => 18,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 50,
				'type' => 'Learning Objective',
				'name' => 'LO 3.3A',
				'description' => 'Analyze functions defined by an integral.',
				'details' => '',
				'parent_id' => 19,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 51,
				'type' => 'Learning Objective',
				'name' => 'LO 3.3B(a)',
				'description' => 'Calculate antiderivatives.',
				'details' => '',
				'parent_id' => 19,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 52,
				'type' => 'Learning Objective',
				'name' => 'LO 3.3B(b)',
				'description' => 'Evalute definite integrals.',
				'details' => '',
				'parent_id' => 19,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 53,
				'type' => 'Learning Objective',
				'name' => 'LO 3.4A',
				'description' => 'Interpret the meaning of a definite integral within a problem.',
				'details' => '',
				'parent_id' => 20,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 54,
				'type' => 'Learning Objective',
				'name' => 'LO 3.4B',
				'description' => 'Apply definite integrals to problems involving the average value of a function.',
				'details' => '',
				'parent_id' => 20,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 55,
				'type' => 'Learning Objective',
				'name' => 'LO 3.4C',
				'description' => 'Apply definite integrals to problems involving motion.',
				'details' => '',
				'parent_id' => 20,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 56,
				'type' => 'Learning Objective',
				'name' => 'LO 3.4D',
				'description' => 'Apply definite integrals to problems involving area, volume, (BC) and length of a curve.',
				'details' => '',
				'parent_id' => 20,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 57,
				'type' => 'Learning Objective',
				'name' => 'LO 3.4E',
				'description' => 'Use the definite integral to solve problems in various contexts.',
				'details' => '',
				'parent_id' => 20,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 58,
				'type' => 'Learning Objective',
				'name' => 'LO 3.5A',
				'description' => 'Analyze differential equations to obtain general and specific solutions.',
				'details' => '',
				'parent_id' => 21,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 59,
				'type' => 'Learning Objective',
				'name' => 'LO 3.5B',
				'description' => 'Interpret, create, and solve differential equations from problems in context.',
				'details' => '',
				'parent_id' => 21,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 60,
				'type' => 'Learning Objective',
				'name' => 'LO 4.1A',
				'description' => 'Determine whether a series converges or diverges.',
				'details' => '',
				'parent_id' => 22,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 61,
				'type' => 'Learning Objective',
				'name' => 'LO 4.1B',
				'description' => 'Determine or estimate the sum of a series.',
				'details' => '',
				'parent_id' => 22,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 62,
				'type' => 'Learning Objective',
				'name' => 'LO 4.2A',
				'description' => 'Construct and use Taylor polynomials.',
				'details' => '',
				'parent_id' => 23,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 63,
				'type' => 'Learning Objective',
				'name' => 'LO 4.2B',
				'description' => 'Write a power series representing a given function.',
				'details' => '',
				'parent_id' => 23,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 64,
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