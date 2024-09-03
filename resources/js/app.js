import './bootstrap';
import './elements/turbo-echo-stream-tag';
import './libs';

import jQuery from 'jquery';
window.$ = jQuery;

import Swal from "sweetalert2";
window.Swal = Swal

import { submitAjaxForm } from './formHelper';
window.submitAjaxForm = submitAjaxForm
