<?php

namespace App\Libraries;

class Table
{
    function template()
    {
        $template = '
        <div class="data-{ name } my-3">
            <h3>{ table_title }</h3>
            <div class="table-{ name }">
                <button class="btn btn-warning btn-sm text-light">
                    <div class="d-flex align-items-center"><i class="bx bx-plus"></i>{table_title}
                    </div>
                </button>
                <div class="table-responsive my-2">
                    <table class="table table-hover table-sm w-100">
                        <thead class="table-primary">
                            <tr>
                                {table_head}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                {table_body}
                            </tr>
                        </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        ';
        return $template;
    }
}
