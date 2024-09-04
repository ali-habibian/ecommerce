import { Controller } from '@hotwired/stimulus';
import * as FilePond from 'filepond';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import FilePondPluginImageExifOrientation from 'filepond-plugin-image-exif-orientation';
import FilePondPluginImageValidateSize from 'filepond-plugin-image-validate-size';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';

import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';

FilePond.registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginImageExifOrientation,
    FilePondPluginImageValidateSize,
    FilePondPluginFileValidateType
);
// Connects to data-controller="filepond"
export default class extends Controller {
    static targets = ['input'];

    static values = {
        process: String,
        restore: String,
        revert: String,
        current: Array,
    };

    /**
     * Connects to the input element and creates a FilePond instance with the specified options.
     *
     * @return {void}
     */
    connect() {
        const pond = FilePond.create(this.inputTarget, {
            name: 'image',
            credits: false,
            acceptedFileTypes: ['image/png', 'image/jpeg'],
        });

        let token = document.head.querySelector('meta[name="csrf-token"]');
        // let submitter = document.querySelector(
        //     'input[type="submit"][form="storeImage"]'
        // );

        pond.setOptions({
            allowMultiple: true,
            files: this.currentValue.map((image) => ({
                source: typeof image === 'string' ? image : image.file_url,

                options: {
                    type: typeof image === 'string' ? 'limbo' : 'local',
                },
            })),

            server: {
                process: {
                    url: this.processValue,
                    headers: {
                        'X-CSRF-Token': token.content,
                    },
                    onload: (response) => {
                        return response; // Return the image path
                    },
                },
                revert: (uniqueFileId, load, error) => {
                    axios
                        .delete(`${this.revertValue}?media=${uniqueFileId}`)
                        .then((response) => {
                            this.uploadTargets.forEach((el) => {
                                if (el.value == uniqueFileId) {
                                    el.remove();
                                }
                            });
                            load();
                        })
                        .catch(error);
                },
                load: (source, load, error, progress, abort, headers) => {
                    axios
                        .get(`${this.restoreValue}?path=${source}`, {
                            responseType: 'blob',
                            onDownloadProgress: (event) => {
                                progress(event.lengthComputable, event.loaded, event.total);
                            },
                        })
                        .then((response) => {
                            headers(response.headers);
                            load(response.data);
                        })
                        .catch(error);
                },
                remove: (source, load, error) => {
                    axios
                        .delete(`${this.revertValue}?media=${source}`)
                        .then(() => {
                            load();
                        })
                        .catch(error);
                },
            },
        });
    }
}
