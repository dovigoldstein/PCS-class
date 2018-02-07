import { Item } from './item.js';

export interface Category {
    name: string;
    items?: Item[];
}