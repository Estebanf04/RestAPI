<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ValidationProductRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Exception;


class ProductController extends BaseController
{


    public function __construct(private readonly ProductRepository $productRepository){}
    

    public function index(): JsonResponse
    {
        $data = $this->productRepository->getAll();
        return $this->successResponse('Products list', $data);
    }

    
    public function store(ValidationProductRequest $request): JsonResponse
    {
        try{
           $this->productRepository->store(
                new ProductRequest(
                    $request->name,
                    $request->description,
                    $request->price,
                    $request->stock
            ));
            return $this->successResponse('Product created succesfully', null, 201, 201);
        }
        catch(Exception $e){
            return $this->errorResponse('An error has been found');
        }
    }


    public function show(Product $product): JsonResponse
    {
        return $this->successResponse('Product details', $product);
    }

    
    public function update(ValidationProductRequest $request, Product $product): JsonResponse
    {
        try{
            $this->productRepository->update($product,
                new ProductRequest(
                    $request->name,
                    $request->description,
                    $request->price,
                    $request->stock
                ));
                return $this->successResponse('Product updated succesfully');
        }
        catch(Exception $e){
            return $this->errorResponse('An error has been found');
        }
    }

    
    public function destroy(Product $product): JsonResponse
    {
        $this->productRepository->delete($product);
        return $this->successResponse('Product deleted succesfully');
    }
}
