        <!-- Start: Search Section -->
        <section class="search-filters" id="search">
            <div class="container">
                <div class="filter-box">
                    <h3>Apa yang sedang kamu cari di perpustakaan?</h3>
                    <form action="{{ route('book.search') }}" method="get">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label class="sr-only" for="keywords">Kata Kunci</label>
                                <input class="form-control" placeholder="Kata Kunci" id="keyword" name="keyword" type="text" value="{{ !empty($r_keyword) ? $r_keyword : '' }}">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <select name="category" id="category" class="form-control">
                                    @if(!empty($r_category))
                                        <option value="{{ $r_category->id }}">{{ $r_category->name }}</option>
                                        <option value="">Semua Kategori</option>
                                        @foreach($category as $fc)
                                            <option value="{{ $fc->id }}">{{ $fc->name }}</option>
                                        @endforeach
                                    @else
                                        <option value="">Semua Kategori</option>
                                        @foreach($category as $fc)
                                            <option value="{{ $fc->id }}">{{ $fc->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <div class="form-group">
                                <input class="form-control" type="submit" value="Temukan">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- End: Search Section -->

        <script>
            const options = []

            document.querySelectorAll('#category > option').forEach((option) => {
                if (options.includes(option.value)) option.remove()
                else options.push(option.value)
            })
        </script>