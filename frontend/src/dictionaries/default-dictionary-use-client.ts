'use client';

import {Locale, i18n} from '../config/i18n.config'

import { defaultDictionary } from './default-dictionaries';

export const getDictionaryUseClient = (locale:Locale) =>{
    return defaultDictionary[locale] ?? defaultDictionary[i18n.defaultLocale as Locale];
}