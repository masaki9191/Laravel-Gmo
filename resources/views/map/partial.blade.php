@foreach ($datas as $data)
    <li>
        <a href="javascript:void(0);">
            <div class="member-view-box">
                <div class="member-image">
                    <div class="member-details">
                        <h3>{{$data->name}}</h3>
                    </div>
                </div>
            </div>
        </a>
        @if(count($data->allChildren) > 0)
            <ul>
                @include('map.partial', ['datas' => $data->allChildren])
            </ul>
        @endif
    </li>
@endforeach


<!-- <ul>
    <li>
        <a href="javascript:void(0);">
            <div class="member-view-box">
                <div class="member-image">
                    <img src="https://image.flaticon.com/icons/svg/145/145867.svg" alt="Member">
                    <div class="member-details">
                        <h3>John Doe</h3>
                    </div>
                </div>
            </div>
        </a>
        <ul class="active">
            <li>
                <a href="javascript:void(0);">
                    <div class="member-view-box">
                        <div class="member-image">
                            <img src="https://image.flaticon.com/icons/svg/145/145867.svg" alt="Member">
                            <div class="member-details">
                                <h3>Member 1</h3>
                            </div>
                        </div>
                    </div>
                </a>
                <ul>
                    <li>
                        <a href="javascript:void(0);">
                            <div class="member-view-box">
                                <div class="member-image">
                                    <img src="https://image.flaticon.com/icons/svg/145/145867.svg"
                                        alt="Member">
                                    <div class="member-details">
                                        <h3>Member 1-1</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <div class="member-view-box">
                        <div class="member-image">
                            <img src="https://image.flaticon.com/icons/svg/145/145867.svg" alt="Member">
                            <div class="member-details">
                                <h3>Member 2</h3>
                            </div>
                        </div>
                    </div>
                </a>
                <ul>
                    <li>
                        <a href="javascript:void(0);">
                            <div class="member-view-box">
                                <div class="member-image">
                                    <img src="https://image.flaticon.com/icons/svg/145/145867.svg"
                                        alt="Member">
                                    <div class="member-details">
                                        <h3>John Doe</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <ul>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="member-view-box">
                                        <div class="member-image">
                                            <img src="https://image.flaticon.com/icons/svg/145/145867.svg"
                                                alt="Member">
                                            <div class="member-details">
                                                <h3>John Doe</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="member-view-box">
                                        <div class="member-image">
                                            <img src="https://image.flaticon.com/icons/svg/145/145867.svg"
                                                alt="Member">
                                            <div class="member-details">
                                                <h3>John Doe</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="member-view-box">
                                        <div class="member-image">
                                            <img src="https://image.flaticon.com/icons/svg/145/145867.svg"
                                                alt="Member">
                                            <div class="member-details">
                                                <h3>John Doe</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <div class="member-view-box">
                                <div class="member-image">
                                    <img src="https://image.flaticon.com/icons/svg/145/145867.svg"
                                        alt="Member">
                                    <div class="member-details">
                                        <h3>John Doe</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <ul>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="member-view-box">
                                        <div class="member-image">
                                            <img src="https://image.flaticon.com/icons/svg/145/145867.svg"
                                                alt="Member">
                                            <div class="member-details">
                                                <h3>John Doe</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="member-view-box">
                                        <div class="member-image">
                                            <img src="https://image.flaticon.com/icons/svg/145/145867.svg"
                                                alt="Member">
                                            <div class="member-details">
                                                <h3>John Doe</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="member-view-box">
                                        <div class="member-image">
                                            <img src="https://image.flaticon.com/icons/svg/145/145867.svg"
                                                alt="Member">
                                            <div class="member-details">
                                                <h3>John Doe</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
</ul> -->