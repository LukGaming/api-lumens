<?php

namespace Database\Factories;

use App\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Produtos;

class ProdutosFactory extends Factory
{
    protected $model = Produtos::class;

    public function definition(): array
    {
    	return [
            'nome' => $this->faker->name(),
            'valor' => $this->faker->currencyCode(),
            'descricao' => $this->faker->text(5000),
        ];
    }
}
