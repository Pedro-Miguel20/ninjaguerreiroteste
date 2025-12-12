// src/utils/toast.ts
import { addToast } from "@heroui/react";

export type ToastColor = 'primary' | 'success' | 'warning' | 'danger';

export function getToastColorByStatus(status: number): ToastColor {
  if (status >= 200 && status < 300) return 'success';
  if (status >= 400 && status < 500) return 'danger';
  if (status >= 500 && status < 600) return 'warning';
  return 'primary';
}

type ToastOptions = {
  title: string;
  description: string;
  color?: ToastColor;
};

export function showToast({ title, description, color = 'primary' }: ToastOptions) {
  addToast({ title, description, color });
}
