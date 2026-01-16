// src/i18n/DictionaryContext.tsx
"use client";

import { createContext, useContext } from "react";
// src/dictionaries/dictionary.ts
import { ptBR } from "../dictionaries/default-language-collections/default-pt-BR";

export type Dictionary = typeof ptBR;


const DictionaryContext = createContext<Dictionary | null>(null);

export function DictionaryProvider({
  dict,
  children,
}: {
  dict: Dictionary;
  children: React.ReactNode;
}) {
  return (
    <DictionaryContext.Provider value={dict}>
      {children}
    </DictionaryContext.Provider>
  );
}

export function useTranslations() {
  const ctx = useContext(DictionaryContext);
  if (!ctx) {
    throw new Error("useTranslations must be used inside DictionaryProvider");
  }
  return ctx;
}
