<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>fake()->sentence,// 生成一个随机句子作为标题
            'description'=>fake()->paragraph,// 生成一个随机段落作为描述
            'long_description'=>fake()->paragraph(7,true), // 7个句子，包含变量数量
            'completed'=>fake()->boolean,
        ];
    }
}
