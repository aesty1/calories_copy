@extends('layouts.layout')

@section('head-title')
    Calories
@endsection


@section('content')

    <div class="calories_page __container">
        <div class="calories__date">
            <a href="#" class="calories__menu_btn date_btn">
                <img src="{{ asset('\resources\img\left.svg') }}" class="calories__menu_btn_img">
            </a>
            <p class="normal_text">Today, June 25</p>
            <a href="#" class="calories__menu_btn date_btn">
                <img src="{{ asset('\resources\img\right.svg') }}" class="calories__menu_btn_img">
            </a>
        </div>
        <div class="calories__menu_block">
            <a href="#" class="calories__menu_btn">
                <img src="{{ asset('\resources\img\left.svg') }}" class="calories__menu_btn_img">
            </a>
            <div class="calories__consumption">
                <p class="big_text">674</p>
                <p class="normal_text">CONSUMPTION</p>
            </div>
            <div class="calories__calories_left">
                <div class="calorius_wrapper">
                    <p class="big_text">2001</p>
                    <p class="normal_text">CALORIES REMAINED</p>
                </div>
            </div>
            <div class="calories__consumption">
                <p class="big_text">674</p>
                <p class="normal_text">CONSUMPTION</p>
            </div>
            <a href="#" class="calories__menu_btn">
                <img src="{{ asset('\resources\img\right.svg') }}" class="calories__menu_btn_img">
            </a>
        </div>
        <div class="calories__protein_block">
            <div id="carbohydrates" class="calories__protein">
                <p class="normal_text">CARBOHYDRATES</p>
                <div class="strip protein__srtip"></div>
                <p class="normal_text">0 / 250</p>
            </div>
            <div id="protein" class="calories__protein">
                <p class="normal_text">PROTEINS</p>
                <div class="strip protein__srtip"></div>
                <p class="normal_text">0 / 250</p>
            </div>
            <div id="fat" class="calories__protein">
                <p class="normal_text">FAT</p>
                <div class="strip protein__srtip"></div>
                <p class="normal_text">0 / 250</p>
            </div>
        </div>
        <div class="calories__eating_time_block">
            <div class="calories__eating_time">
                <div class="eating_time_text__wrapper">
                    <div class="image_wrapper">
                        <img src="" alt="" class="image calories__image">
                    </div>
                    <div class="text__wrapper">
                        <p class="normal_plus_text">Breakfast</p>
                        <p class="normal_text">500-600 kcal is recommended</p>
                    </div>
                    <a href="" class="plus_button calories__button">

                    </a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn plus_button calories__button" data-bs-toggle="modal"
                            data-bs-target="#search_product">
                        <img src="{{ asset('\resources\img\plus_button.svg') }}" alt="" class="plus_image button_image">
                    </button>
                </div>
                <div class="calories__hr_wrapper">
                    <hr>
                    <p class="normal_text">520 kcal</p>
                </div>

                <!-- Modal for breakfast -->

                <!-- Modal -->
                <div class="modal fade" id="search_product" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add breakfast</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3 d-flex">
                                    <input autocomplete="off" class="form-control me-3" id="search" type="text"
                                           placeholder="Search products" aria-label="default input example">
                                    <button type="button" class="btn btn-outline-success">Add</button>
                                </div>
                                <div>Тут должны выводится продукты (делаешь запрос каждый раз, когда изменяется хоть
                                    одна буква в поиске)
                                    Посмотри api - /product. Примерно такая структура:
                                </div>
                                <hr>
                                <div>
                                    Продукты пользователя
                                    <ul>
                                        <li>Apple</li>
                                        <li>Banana</li>
                                        <li>Beef</li>
                                    </ul>
                                    <hr>
                                    Все продукты
                                    <ul>
                                        <li>sdfsd</li>
                                        <li>sdf</li>
                                        <li>sdfsdf</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                                <button type="button" class="btn btn-primary">Save product</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="calories__eating_time">
                <div class="eating_time_text__wrapper">
                    <div class="image_wrapper">
                        <img src="" alt="" class="image calories__image">
                    </div>
                    <div class="text__wrapper">
                        <p class="normal_plus_text">Brunch</p>
                        <p class="normal_text">500-600 kcal is recommended</p>
                    </div>
                    <a href="" class="plus_button calories__button">
                        <img src="{{ asset('\resources\img\plus_button.svg') }}" alt="" class="plus_image button_image">
                    </a>
                </div>

                <div class="calories__hr_wrapper">
                    <hr>
                    <p class="normal_text">520 kcal</p>
                </div>
            </div>
            <div class="calories__eating_time">
                <div class="eating_time_text__wrapper">
                    <div class="image_wrapper">
                        <img src="" alt="" class="image calories__image">
                    </div>
                    <div class="text__wrapper">
                        <p class="normal_plus_text">Dinner</p>
                        <p class="normal_text">500-600 kcal is recommended</p>
                    </div>
                    <a href="" class="plus_button calories__button">
                        <img src="{{ asset('\resources\img\plus_button.svg') }}" alt="" class="plus_image button_image">
                    </a>
                </div>

                <div class="calories__hr_wrapper">
                    <hr>
                    <p class="normal_text">520 kcal</p>
                </div>
            </div>
            <div class="calories__eating_time">
                <div class="eating_time_text__wrapper">
                    <div class="image_wrapper">
                        <img src="" alt="" class="image calories__image">
                    </div>
                    <div class="text__wrapper">
                        <p class="normal_plus_text">Lunch</p>
                        <p class="normal_text">500-600 kcal is recommended</p>
                    </div>
                    <a href="" class="plus_button calories__button">
                        <img src="{{ asset('\resources\img\plus_button.svg') }}" alt="" class="plus_image button_image">
                    </a>
                </div>

                <div class="calories__hr_wrapper">
                    <hr>
                    <p class="normal_text">520 kcal</p>
                </div>
            </div>
            <div class="calories__eating_time">
                <div class="eating_time_text__wrapper">
                    <div class="image_wrapper">
                        <img src="" alt="" class="image calories__image">
                    </div>
                    <div class="text__wrapper">
                        <p class="normal_plus_text">Training</p>
                        <p class="normal_text">Recommended for 30 minutes</p>
                    </div>
                    <a href="" class="plus_button calories__button">
                        <img src="{{ asset('\resources\img\plus_button.svg') }}" alt="" class="plus_image button_image">
                    </a>
                </div>
            </div>
            <div class="calories__eating_time">
                <div class="eating_time_text__wrapper">
                    <div class="text__wrapper bucket_text">
                        <p class="normal_plus_text">Water</p>
                    </div>
                    <div class="eating_buckets_wrapper">
                        <img src="{{ asset('\resources\img\bucket.svg') }}" alt="" class="bucket_image">
                        <img src="{{ asset('\resources\img\bucket.svg') }}" alt="" class="bucket_image">
                        <img src="{{ asset('\resources\img\bucket.svg') }}" alt="" class="bucket_image">
                        <img src="{{ asset('\resources\img\bucket.svg') }}" alt="" class="bucket_image">
                        <img src="{{ asset('\resources\img\bucket.svg') }}" alt="" class="bucket_image">
                        <img src="{{ asset('\resources\img\bucket.svg') }}" alt="" class="bucket_image">
                    </div>

                </div>
                <a href="" class="plus_button calories__button">
                    <img src="{{ asset('\resources\img\plus_button.svg') }}" alt="" class="plus_image button_image">
                </a>
                <div class="calories__hr_wrapper">
                    <hr>
                    <p class="normal_text">520 ml</p>
                </div>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_product">Add your product</button>

            <div class="modal fade" id="add_product" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add your product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row pb-4">
                                <div class="col">
                                    <input autocomplete="off" class="form-control me-3" id="" type="text"
                                           placeholder="Product name" aria-label="default input example">
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="col">
                                    <input autocomplete="off" class="form-control me-3" id="" type="number"
                                           placeholder="Carbohydrates" aria-label="default input example">
                                </div>
                                <div class="col">
                                    <input autocomplete="off" class="form-control me-3" id="" type="number"
                                           placeholder="Fats" aria-label="default input example">
                                </div>
                                <div class="col">
                                    <input autocomplete="off" class="form-control me-3" id="" type="number"
                                           placeholder="Protein" aria-label="default input example">
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="col">
                                    <input autocomplete="off" class="form-control me-3" id="" type="number"
                                           placeholder="Calories per 100 grams" aria-label="default input example">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                            <button type="button" class="btn btn-primary">Add product</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('\resources\js\find-products.js') }}"></script>
<!-- <script>
    axios.get('/api/user/products?name=Apple').then(response => {
        console.log(typeof(response));
        console.log(response.data.data[0].name);
    })
</script> -->
