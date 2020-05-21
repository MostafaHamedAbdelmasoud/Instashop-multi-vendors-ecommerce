<template>
    <div class="form-group">
        <label :for="name" v-if="label">{{ label }}</label>
        <select ref="select" class="form-control" :name="name" :id="name"
                v-model="multiple ? selected_values : selected" :multiple="multiple">
            <option value="" v-if="placeholder">{{ placeholder }}</option>
            <option v-for="item in items.data" :key="item.id" :data-image="item.image" :value="item.id">{{ item.text
                }}
            </option>
        </select>
    </div>
</template>

<script>
    export default {
        props: {
            name: {
                required: true,
                type: String,
            },
            multiple: {
                required: false,
                default: false,
            },
            label: {
                required: false,
                type: String,
            },
            placeholder: {
                required: false,
                type: String,
            },
            remoteUrl: {
                required: true,
                type: String,
            },
            value: {
                required: false,
                default: null
            },
        },
        data() {
            return {
                items: [],
                selected: '',
                selected_values: [],
            }
        },
        mounted() {
            if (this.value) {
                if (this.multiple && Array.from(this.value).length) {
                    this.selected_values = Array.from(this.value);
                } else {
                    this.selected = this.value;
                }
                axios.get(this.remoteUrl, {selected_id: this.selected || this.selected_values})
                    .then(response => {
                        this.items = response.data;
                        if (Array.from(this.value).length) {
                            this.selected_values = Array.from(this.value);
                        } else {
                            this.selected = this.value;
                        }
                    });
            }
            let dir = $('html').attr('dir');
            $(this.$refs.select).select2({
                theme: 'bootstrap4',
                dir,
                ajax: {
                    url: this.remoteUrl,
                    dataType: 'json',
                    delay: 250,
                    data: (params) => {
                        return {
                            selected_id: this.selected || this.selected_values,
                            name: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {

                        this.items = data;
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;

                        return {
                            results: data.data,
                            pagination: {
                                more: (params.page * 15) < data.meta.total
                            }
                        };
                    },
                    cache: true
                },
                language: {
                    errorLoading: () => {
                        return this.$t('select2.errorLoading');
                    },
                    inputTooLong: args => {
                        let overChars = args.input.length - args.maximum;

                        return this.$t('select2.inputTooLong', {overChars});
                    },
                    inputTooShort: args => {
                        let remainingChars = args.minimum - args.input.length;

                        return this.$t('select2.inputTooShort', {remainingChars});
                    },
                    loadingMore: () => {
                        return this.$t('select2.loadingMore');
                    },
                    maximumSelected: args => {
                        let maximum = args.maximum;

                        return this.$t('select2.maximumSelected', {maximum});
                    },
                    noResults: () => {
                        return this.$t('select2.noResults');
                    },
                    searching: () => {
                        return this.$t('select2.searching');
                    },
                    removeAllItems: () => {
                        return this.$t('select2.removeAllItems');
                    }
                },
                templateResult: this.formatRepo,
                templateSelection: this.formatRepoSelection
            });
            $(document).on('change', this.$refs.select, (e) => {
                this.selected = e.target.value;
            });
        },
        methods: {
            formatRepo(item) {
                if (item.loading) {
                    return this.$t('select2.searching');
                }
                let $html = "<div class='select2-result-repository clearfix'>";
                if (item.image) {
                    $html += "<div class='select2-result-repository__avatar'>" +
                        "<img src='" + item.image + "' />" +
                        "</div>";
                }

                $html += "<div class='select2-result-repository__meta'>" +
                    "<div class='select2-result-repository__title'></div>" +
                    "</div>" +
                    "</div>";
                let $container = $($html);

                $container.find(".select2-result-repository__title").text(item.text);

                return $container;
            },
            formatRepoSelection(item) {
                let $img = item.image || $(item.element).data('image');
                let $html = "<div class='select2-result-repository clearfix'>";
                if ($img) {
                    $html += "<div class='select2-selection-result-repository__avatar'>";
                    $html += `<img src="${$img}"/></div>`
                }
                $html += "<div class='select2-selection-result-repository__meta'>" +
                    "<div class='select2-selection-result-repository__title'>";
                $html += item.text || this.placeholder;
                $html += "</div></div></div>";

                return $($html);
            },
            serialize(obj) {
                var str = [];
                for (var p in obj)
                    if (obj.hasOwnProperty(p)) {
                        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
                    }
                return str.join("&");
            }
        }
    }
</script>

<style>
    .select2-result-repository__avatar, .select2-result-repository__meta,
    .select2-selection-result-repository__avatar, .select2-selection-result-repository__meta {
        display: inline-block;
    }

    .select2-result-repository__title, .select2-selection-result-repository__title {
        margin: 0 3px;
    }

    .select2-container[dir=rtl] .select2-selection--single .select2-selection__rendered {
        padding: 0 10px;
    }

    .select2-result-repository__avatar img {
        width: 30px;
        border-radius: 50%;
    }

    .select2-selection-result-repository__avatar img {
        width: 23px;
        border-radius: 50%;
    }

    .select2-container .select2-selection--single {
        height: 34px;
    }

    .select2-container--default .select2-selection--single {
        border: 1px solid #d2d6de;
        border-radius: 0;
    }

    .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice {
        padding: 2px 0 2px 20px;
    }
    .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice__remove {
        background: transparent;
        border: 0;
    }
    .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice {
         padding: 0;
        display: flex;
        margin: 5px;
    }
</style>
