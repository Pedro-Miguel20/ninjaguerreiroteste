import 'server-only'

import {Locale, i18n} from '../config/i18n.config'

import { defaultDictionary } from './default-dictionaries';

export const getDictionaryServerOnly= (locale:Locale) =>{
    return defaultDictionary[locale] ?? defaultDictionary[i18n.defaultLocale as Locale];
}